<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $games = Game::all();
        return response()->json($games);
    }

    /**
     * Show the form for creating a new resource.
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
        //
        $game = Game::find($id);
        return response()->json($game);
    }
}
