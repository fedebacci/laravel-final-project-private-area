<?php
namespace App\Filters;

use Illuminate\Http\Request;

class QueryFilter
{
    public static function apply($query, Request $request)
    {
        if ($request->filled('name')) {
            // $query->where('name', $request->input('name'));
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('description')) {
            // $query->where('description', $request->input('description'));
            $query->where('description', 'like', '%' . $request->input('description') . '%');
        }

        // todo: decide how to manage selection between max and min: with if (and related added property instead of only price) or with maxprice and minprice properties?
        // if ($request->filled('price')) {
        //     if () {
        //         $query->where('price', '>=',  $request->input('price'));
        //     } else {
        //         $query->where('price', '<=',  $request->input('price'));
        //     }
        // }

        if ($request->filled('game_id')) {
            dump('game id is present');
            $query->where('game_id', $request->input('game_id'));
        }

        // ! Not about allowing image search, but about retrieving only models that have one
        // ? Initially I would only receive 'image' => true and retrieve only models that have it, but does it also make sense to receive 'image' => false to retrieve models without one?
        if ($request->filled('image')) {
            $query->whereNotNull('image');
        }

        // if ($request->filled('client_id')) {
        //     $query->where('client_id', $request->input('client_id'));
        // }

        // if ($request->filled('service_id')) {
        //     $query->where('service_id', $request->input('service_id'));
        // }

        // if ($request->filled('status')) {
        //     $query->where('status', $request->input('status'));
        // }

        // if ($request->filled('user_id')) {
        //     $query->where('created_by', $request->input('user_id'));
        // }

        // if ($request->filled('type')) {
        //     $query->where('type', $request->input('type'));
        // }

        // if ($request->filled('start_date')) {
        //     $query->where('date', '>=', $request->input('start_date') . ' 00:00:00');
        // }

        // if ($request->filled('end_date')) {
        //     $query->where('date', '<=', $request->input('end_date') . ' 23:59:59');
        // }

        return $query;
    }
}
