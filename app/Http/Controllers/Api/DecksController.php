<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deck;
use Illuminate\Http\Request;

class DecksController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $decks = Deck::all();
        $decks->load('game', 'cards');
        return response()->json([
            'message' => 'Decks retrieved successfully',
            'resources' => $decks
        ]);
    }

    //
    /**
     * Display a listing of the resource.
     */
    public function paginatedIndex()
    {
        //
        $decks = Deck::paginate(10);
        $decks->load('game', 'cards');
        return response()->json([
            'message' => 'Decks retrieved successfully',
            'resources' => $decks
        ]);
    }

    /**
     * Show a single resource.
     */
    // # RETURNS EMPTY ARRAY
    // - Doing it with ID and retrieving from DataBase    
    // public function show(Deck $deck)
    // {
    //     //
    //     $deck->load('game', 'cards');
    //     return response()->json($deck);
    // }
    public function show($id)
    {
        //
        $deck = Deck::find($id);
        $deck->load('game', 'cards');
        return response()->json($deck);
    }
}
