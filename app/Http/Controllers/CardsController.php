<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cards = Card::paginate(10);
        return view('cards.index', compact('cards'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
        return view('cards.show', compact('card'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $games = Game::all();
        return view('cards.create', compact('games'));
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
            return redirect()->back()->withInput()->withErrors(['name' => 'The name is required for saving a new card.']);
        }
        if (!$request->has('game_id')) {
            return redirect()->back()->withInput()->withErrors(['game' => 'You have to specify the game for saving a new card.']);
        }



        $newCard = new Card();

        $newCard->name = $data['name'];
        $newCard->game_id = $data['game_id'];
        $newCard->description = $data['description'];
        $newCard->price = $data['price'];
        $newCard->edition = $data['edition'];

        // if (key_exists('image', $data)) {
        if (array_key_exists('image', $data)) {
            // - Sets random unique string to avoid duplicates and renames the image
            // - Could do it manually to mantain the name using user id and timestamps with ::put static method
            $image = Storage::putFile('cards', $data['image']);
            $newCard->image = $image;
        }

        // dd($newCard);
        $newCard->save();


        return redirect()->route('cards.show', $newCard->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
        $games = Game::all();
        return view('cards.edit', compact('card', 'games'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        //

        $data = $request->all();
        // dd($data);


        // # TEST
        // return redirect()->back()->withInput()->withErrors(['TEST' => 'TESTING RETRIEVED INPUTS VALUE']);
        
        


        if (!array_key_exists('name', $data)) {
            return redirect()->back()->withInput()->withErrors(['name' => 'The name is required for updating a card.']);
        }
        if (!$request->has('game_id')) {
            return redirect()->back()->withInput()->withErrors(['game' => 'You have to specify the game for updating a card.']);
        }        
    
        $card->name = $data['name'];
        $card->game_id = $data['game_id'];
        $card->description = $data['description'];
        $card->price = $data['price'];
        $card->edition = $data['edition'];

        if (array_key_exists('image', $data)) {
            if ($card->getOriginal('image')) {
                // dump("LA CARTA AVEVA UN'IMMAGINE");
                Storage::delete($card->image);
            } else {
                // dump("LA CARTA ERA SENZA UN'IMMAGINE");
            }
            $image = Storage::putFile('cards', $data['image']);
            $card->image = $image;
        } else {
            // dump("L'IMMAGINE NON È STATA SETTATA");
        }        

        // dd($card);
        $card->save();


        return redirect()->route('cards.show', $card);
    
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
        if ($card->image) {
            Storage::delete($card->image);
        }

        // dd($card);
        $card->decks()->detach();

        $card->delete();

        return redirect()->route('cards.index');        
    }
}
