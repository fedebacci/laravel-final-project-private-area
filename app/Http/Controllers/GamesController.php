<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $games = Game::paginate(10);
        return view('games.index', compact('games'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        // dd($data);
        // if (key_exists('name', $data)) {
        if (!array_key_exists('name', $data)) {
            return redirect()->back()->withInput()->withErrors(['name' => 'The name is required for saving a new game.']);
        }





        $newGame = new Game();

        $newGame->name = $data['name'];
        $newGame->description = $data['description'];

        // if (key_exists('logo', $data)) {
        if (array_key_exists('logo', $data)) {
            // - Sets random unique string to avoid duplicates and renames the image
            // - Could do it manually to mantain the name using user id and timestamps with ::put static method
            $logo = Storage::putFile('games', $data['logo']);
            $newGame->logo = $logo;
        }

        // dd($newGame);
        $newGame->save();






        return redirect()->route('games.show', $newGame->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
