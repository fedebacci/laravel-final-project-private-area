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
    public function index(Request $request)
    {
        $query = Game::query();
        $query = QueryFilter::apply($query, $request);
        $data = $query->get();

        return response()->json([
            'message' => 'Getting filtered Games from index',
            'data' => $data,
        ]);        
    }

    // /**
    //  * Display a listing all of the resource with pagination.
    //  */
    // public function paginatedIndex()
    // {
    //     //
    //     $games = Game::paginate(10);
    //     return response()->json([
    //         'message' => 'Games paginatedIndex retrieved successfully',
    //         'data' => $games
    //     ]);
    // }

    /**
     * Show a single resource.
     */
    public function show($id)
    {
        $game = Game::find($id);

        $game->cards = $game->cards;
        $game->decks = $game->decks;

        // return response()->json($game);
        return response()->json([
            'message' => 'Game ' . $id . ' retrieved successfully',
            'data' => $game,
        ]);
    }
}
