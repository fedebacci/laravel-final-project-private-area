<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;

use App\Filters\QueryFilter;
use App\Models\Card;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of all the resource.
     */
    public function index()
    {
        //
        $games = Game::all();

        return response()->json([
            'message' => 'Games retrieved successfully',
            'resources' => $games
        ]);
    }

    /**
     * Display a listing all of the resource with pagination.
     */
    public function paginatedIndex()
    {
        //
        $games = Game::paginate(10);
        return response()->json([
            'message' => 'Games retrieved successfully',
            'resources' => $games
        ]);
    }

    /**
     * Show a single resource.
     */
    // # RETURNS EMPTY ARRAY
    // - Doing it with ID and retrieving from DataBase
    // public function show(Game $game)
    // {
    //     //
    //     return response()->json($game);
    // }
    public function show($id)
    {
        $game = Game::find($id);

        $game->cards = $game->cards;
        $game->decks = $game->decks;

        // return response()->json($game);
        return response()->json([
            'resource' => $game,
        ]);
    }
}
