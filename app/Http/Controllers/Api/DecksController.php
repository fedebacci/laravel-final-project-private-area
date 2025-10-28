<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deck;
use Illuminate\Http\Request;

use App\Filters\QueryFilter;

class DecksController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $decks = Deck::all();
        // $decks->load('game', 'cards');
        // return response()->json([
        //     'message' => 'Decks retrieved successfully',
        //     'resources' => $decks
        // ]);
        $query = Deck::query();
        $query = QueryFilter::apply($query, $request);
        $data = $query->get();

        return response()->json([
            'message' => 'Getting filtered Decks from index',
            'data' => $data,
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
            'data' => $decks
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
        return response()->json([
            'message' => 'Deck ' . $id . ' retrieved successfully',
            'data' => $deck
        ]);
    }
}
