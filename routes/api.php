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


// # RETURNS EMPTY ARRAY
// - Doing it with ID and retrieving from DataBase
// Route::get('games/{game}', [GamesController::class, 'show']);
// Route::get('cards/{cards}', [CardsController::class, 'show']);
// Route::get('decks/{decks}', [DecksController::class, 'show']);
Route::get('games/{id}', [GamesController::class, 'show']);
Route::get('cards/{id}', [CardsController::class, 'show']);
Route::get('decks/{id}', [DecksController::class, 'show']);

