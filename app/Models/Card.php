<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function decks() {
        return $this->belongsToMany(Deck::class);
    }
}
