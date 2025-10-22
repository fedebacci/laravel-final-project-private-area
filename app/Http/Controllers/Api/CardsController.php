<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    //
    /**
     * Display a listing of all the resource.
     */
    public function index()
    {
        //
        $cards = Card::all();
        $cards->load('game', 'decks');
        return response()->json([
            'message' => 'Cards retrieved successfully',
            'resources' => $cards
        ]);        
    }

    //
    /**
     * Display a listing of the resource with pagination.
     */
    public function paginatedIndex()
    {
        //
        $cards = Card::paginate(10);
        $cards->load('game', 'decks');
        return response()->json([
            'message' => 'Cards retrieved successfully',
            'resources' => $cards
        ]);        
    }

    //
    /**
     * Display a listing of the resource with pagination, filtering only the ones with an image.
     */
    public function paginatedIndexWithImages()
    {
        //
        $cards = Card::where('image', '!=', 'null')->paginate(10);
        $cards->load('game', 'decks');
        return response()->json([
            'message' => 'Cards retrieved successfully',
            'resources' => $cards
        ]);        
    }

    /**
     * Show a single resource.
     */
    // # RETURNS EMPTY ARRAY
    // - Doing it with ID and retrieving from DataBase
    // public function show(Card $card)
    // {
    //     //
    //     $card->load('game', 'decks');
    //     return response()->json($card);
    // }
    public function show($id)
    {
        //
        $card = Card::find($id);
        $card->load('game', 'decks');
        return response()->json($card);
    }
}
