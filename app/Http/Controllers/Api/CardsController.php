<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;


use App\Filters\QueryFilter;

class CardsController extends Controller
{
    // //
    // /**
    //  * # Testing filters application.
    //  */
    // public function getFiltered(Request $request)
    // {
    //     //
    //     $query = Card::query();
    //     $query = QueryFilter::apply($query, $request);
    //     $data = $query->get();


    //     return response()->json([
    //         'message' => 'Getting filtered cards',
    //         // 'filteredResources' => $cards,
    //         'data' => $data,
    //     ]);
    // }




    /**
     * Display a listing of all the resource.
     */
    public function index(Request $request)
    {
        //
        // $cards = Card::all();
        // $cards->load('game', 'decks');
        // return response()->json([
        //     'message' => 'Cards retrieved successfully',
        //     'data' => $cards
        // ]);
        $query = Card::query();
        $query = QueryFilter::apply($query, $request);
        $data = $query->get();

        return response()->json([
            'message' => 'Getting filtered cards from index',
            'data' => $data,
        ]);
    }

    // //
    // /**
    //  * Display a listing of the resource with pagination.
    //  */
    // public function paginatedIndex()
    // {
    //     //
    //     $cards = Card::paginate(10);
    //     // $cards->load('game', 'decks');
    //     return response()->json([
    //         'message' => 'Cards retrieved successfully',
    //         'data' => $cards
    //     ]);        
    // }

    // //
    // /**
    //  * Display a listing of the resource with pagination, filtering only the ones with an image.
    //  */
    // public function paginatedIndexWithImages()
    // {
    //     //
    //     $cards = Card::where('image', '!=', 'null')->paginate(10);
    //     // $cards->load('game', 'decks');
    //     return response()->json([
    //         'message' => 'Cards retrieved successfully',
    //         'data' => $cards
    //     ]);        
    // }

    /**
     * Show a single resource.
     */
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
