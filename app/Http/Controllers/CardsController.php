<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Http\Request;

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

        // # Section for uploading file (not working)
        // todo: uncomment when file upload is fixed (look in depth to https://laravel.com/docs/11.x/filesystem if help is not provided)
        // // if (key_exists('image', $data)) {
        // if (array_key_exists('image', $data)) {
        //     // - Sets random unique string to avoid duplicates and renames the image
        //     // - Could do it manually to mantain the name using user id and timestamps with ::put static method
        //     $image = Storage::putFile('games', $data['image']);
        //     $newCard->image = $image;
        // }

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
        return view('cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
