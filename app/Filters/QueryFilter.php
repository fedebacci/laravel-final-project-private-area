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

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        if ($request->filled('game_id')) {
            // dump('game id is present');
            $query->where('game_id', $request->input('game_id'));
        }

        // ! Not about allowing image search, but about retrieving only models that have one
        // ? Initially I would only receive 'image' => true and retrieve only models that have it, but does it also make sense to receive 'image' => false to retrieve models without one?
        if ($request->filled('image')) {
            $query->whereNotNull('image');
        }

        if ($request->filled('limit')) {
            $query->limit($request->input('limit'));
        }
        
        // ! For now works more like limit (gives back right number of resources but does not give back pagination links)
        // todo: differentiate from limit by managing pagination links both here and in results of public's area request
        // if ($request->filled('paginate')) {
        //     $query->paginate($request->input('paginate'));
        // }

        return $query;
    }
}
