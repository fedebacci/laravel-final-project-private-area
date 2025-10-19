<?php

use App\Http\Controllers\Api\CardsController;
use App\Http\Controllers\Api\DecksController;
use App\Http\Controllers\Api\GamesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



// ! ERROR: Array to string conversion
// - Can't I use resource here?
// Route::resource('games', [GamesController::class, 'index']);
// Route::resource('cards', [CardsController::class, 'index']);
// Route::resource('decks', [DecksController::class, 'index']);
Route::get('games', [GamesController::class, 'index']);
Route::get('cards', [CardsController::class, 'index']);
Route::get('decks', [DecksController::class, 'index']);
