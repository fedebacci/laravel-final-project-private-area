<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Deck;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class DecksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $games = Game::all();
        for ($i = 0; $i < count($games) * 2; $i++) {

            $gameId = floor($i / 2) + 1;
            $gameAvailableCards = Card::where('game_id', $gameId)->get();
            $maxDeckPrice = 0;
            foreach($gameAvailableCards as $gameAvailableCard) {
                $maxDeckPrice += $gameAvailableCard->price;
            }

            $newDeck = new Deck();

            $newDeck->game_id = $gameId;
            $newDeck->name = $faker->word();
            $newDeck->description = $faker->text();
            // $newDeck->price = $i % 2 == 0 ? $faker->randomFloat(2, 1, $maxDeckPrice) : null;
            
            // # DEBUG
            $newDeck->price = $i % 2 == 0 ? $maxDeckPrice : null;
            // // $newDeck->price = 10000;
            // $newDeck->price = 1;
            // // $newDeck->price = null;

            dump($newDeck->name);
            dump($maxDeckPrice);

            $newDeck->save();
        }
    }
}
