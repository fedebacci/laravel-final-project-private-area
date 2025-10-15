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

        // # Section for uploading file (not working)
        // todo: uncomment when file upload is fixed (look in depth to https://laravel.com/docs/11.x/filesystem if help is not provided)
        // // if (key_exists('logo', $data)) {
        // if (array_key_exists('logo', $data)) {
        //     // - Sets random unique string to avoid duplicates and renames the image
        //     // - Could do it manually to mantain the name using user id and timestamps with ::put static method
        //     $logo = Storage::putFile('games', $data['logo']);
        //     $newGame->logo = $logo;
        // }

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
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
        $data = $request->all();
        // dd($data);
        // dump($game);
        // - getOriginal() found on: https://laravel.com/docs/11.x/eloquent#examining-attribute-changes
        // - see also isDirty() to see if model's attributes HAVE BEEN changed
        // - see also isClean() to see if model's attributes HAVE NOT BEEN changed
        // todo: see also wasChanged() on the same page and decide the best
        // dump($game->getOriginal());
        // dump($game->getOriginal('logo'));

        // if (key_exists('name', $data)) {
        if (!array_key_exists('name', $data)) {
            return redirect()->back()->withInput()->withErrors(['name' => 'The name is required for updating a game.']);
        }
        
        
        
        $game->name = $data['name'];
        $game->description = $data['description'];

        // # Section for deleting file and uploading new one, IF NECESSARY (not working)
        // todo: uncomment when file upload is fixed (look in depth to https://laravel.com/docs/11.x/filesystem if help is not provided)
        // if (array_key_exists('logo', $data)) {
        //     if ($game->getOriginal('logo')) {
        //         dump('IL GIOCO AVEVA UN LOGO');
        //         Storage::delete($game->logo);
        //     } else {
        //         dump('IL GIOCO ERA SENZA UN LOGO');
        //     }
        //     $logo = Storage::putFile('games', $data['logo']);
        //     $game->logo = $logo;
        // } else {
        //     dump('IL LOGO NON È STATO SETTATO');
        // }

        
        // dd($game);
        $game->update();

        return redirect()->route('games.show', $game->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //

        // if ($game->logo) {
        //     Storage::delete($game->logo);
        // }

        // $game->cards()->detach();
        // $game->decks()->detach();

        // $game->delete();

        // return redirect()->route('games.index');
    }
}
