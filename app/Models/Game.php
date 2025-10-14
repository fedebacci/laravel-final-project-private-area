<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    public function cards() {
        return $this->hasMany(Card::class);
    }
    
    public function decks() {
        return $this->hasMany(Deck::class);
    }
}
