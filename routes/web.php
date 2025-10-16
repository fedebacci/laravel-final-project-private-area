<?php

use App\Http\Controllers\CardsController;
use App\Http\Controllers\DecksController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('games', GamesController::class)->middleware(['auth', 'verified']);
Route::resource('cards', CardsController::class)->middleware(['auth', 'verified']);
Route::resource('decks', DecksController::class)->middleware(['auth', 'verified']);

// # TEST
// - Having its own button and route would be more intuive to use than setting cards inside decks.edit route 
Route::get('decks/{deck}/setCards', [DecksController::class, 'setCards'])->middleware(['auth', 'verified'])->name('decks.setCards');
Route::put('decks/{deck}/updateDeckCards', [DecksController::class, 'updateDeckCards'])->middleware(['auth', 'verified'])->name('decks.updateDeckCards');



require __DIR__.'/auth.php';
