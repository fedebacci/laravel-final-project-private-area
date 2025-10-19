<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use App\Models\Game;
use Illuminate\Http\Request;

class DecksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $data = $request->all();


        if (!array_key_exists('search', $data)) {
            $decks = Deck::paginate(10);
            $searchValue = null;
        } else if ($data['search'] == null) {
            return redirect(route('decks.index'));
        } else {
            $decks = Deck::where('name', 'like', '%' . $data['search'] . '%')->paginate(10);
            $searchValue = $data['search'];
        }
        return view('decks.index', compact('decks', 'searchValue'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Deck $deck)
    {
        //
        return view('decks.show', compact('deck'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $games = Game::all();

        return view('decks.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        // dd($data);

        // # TEST
        // return redirect()->back()->withInput()->withErrors(['TEST' => 'TESTING RETRIEVED INPUTS VALUE']);

        if (!array_key_exists('name', $data)) {
            return redirect()->back()->withInput()->withErrors(['name' => 'The name is required for creating a new deck.']);
        }
        if (!$request->has('game_id')) {
            return redirect()->back()->withInput()->withErrors(['game' => 'You have to specify the game for creating a new deck.']);
        }    
        
        $newDeck = new Deck();
    
        $newDeck->name = $data['name'];
        $newDeck->game_id = $data['game_id'];
        $newDeck->description = $data['description'];
        // - NB: Price should not exist here
        $newDeck->price = $data['price'] ?? null;

        // dd($card);
        $newDeck->save();

        return redirect()->route('decks.show', $newDeck->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deck $deck)
    {
        //
        $games = Game::all();
        $availableCards = Card::where('game_id', $deck->game_id)->get();
        return view('decks.edit', compact('deck', 'games', 'availableCards'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deck $deck)
    {
        //

        $data = $request->all();
        // dd($data);

        if (array_key_exists('cards', $data)) {
            $selectedCards = Card::whereIn('id', $data['cards'])->get();
            $selectedCardsValue = 0;
            foreach ($selectedCards as $selectedCard) {
                $selectedCardsValue += $selectedCard->price;
            }
            if ($selectedCardsValue < $data['price']) {
                return redirect()->back()->withInput()->withErrors(['Pricing error' => "The price of the deck (" . $data['price'] . ") exceeds the value of the selected cards ($selectedCardsValue).\nLower the deck's price or choose different cards"]);
            }
        } else if (!array_key_exists('cards', $data) && $data['price'] != 0) {
            return redirect()->back()->withInput()->withErrors(['Pricing error' => "The deck has a price set but has not any cards.\nPlease assign to the deck some cards that are worth at least the deck price or remove the deck price"]);
        }




        // # TEST
        // return redirect()->back()->withInput()->withErrors(['TEST' => 'TESTING RETRIEVED INPUTS VALUE']);

        if (!array_key_exists('name', $data)) {
            return redirect()->back()->withInput()->withErrors(['name' => 'The name is required for updating a deck.']);
        }
        if (!$request->has('game_id')) {
            return redirect()->back()->withInput()->withErrors(['game' => 'You have to specify the game for updating a deck.']);
        }        
    
        $deck->name = $data['name'];
        $deck->game_id = $data['game_id'];
        $deck->description = $data['description'];
        $deck->price = $data['price'];

        // dd($card);
        $deck->save();



        // # If there are cards, sync them to the deck
        if ($request->has('cards')) {
            // dd($data['cards']);
            $deck->cards()->sync($data['cards']);
        } else {
            $deck->cards()->detach();
        }


        

        return redirect()->route('decks.show', $deck);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deck $deck)
    {
        //
        // dd($deck);
        // dd($deck->cards);
        $deck->cards()->detach();

        $deck->delete();

        return redirect()->route('decks.index');            
    }
}
