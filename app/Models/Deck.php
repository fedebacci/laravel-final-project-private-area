<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    //
    public function game() {
        return $this->belongsTo(Game::class);
    }

    // public function cards() {
    //     return $this->belongsToMany(Card::class);
    // }
}
