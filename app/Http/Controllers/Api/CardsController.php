<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;


use App\Filters\QueryFilter;

class CardsController extends Controller
{
    /**
     * Display a listing of all the resource.
     */
    public function index(Request $request)
    {
        $query = Card::query();
        $query = QueryFilter::apply($query, $request);
        $data = $query->get();

        return response()->json([
            'message' => 'Getting filtered cards from index',
            'data' => $data,
        ]);
    }

    /**
     * Show a single resource.
     */
    // # RETURNS EMPTY ARRAY
    // - Doing it with ID and retrieving from DataBase   
    // public function show(Card $card)
    public function show($id)
    {
        //
        $card = Card::find($id);
        $card->load('game', 'decks');
        return response()->json([
            'message' => 'Card ' . $id . ' retrieved successfully',
            'data' => $card
        ]);
    }
}
