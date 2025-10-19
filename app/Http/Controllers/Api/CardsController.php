<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $cards = Card::all();
        $cards = Card::with('game', 'decks')->get();
        return response()->json($cards);        
    }

    /**
     * Show the form for creating a new resource.
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
