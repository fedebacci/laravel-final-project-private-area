<?php

namespace Database\Seeders;

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
            $newDeck = new Deck();

            $newDeck->game_id = floor($i / 2) + 1;
            $newDeck->name = $faker->word();
            $newDeck->description = $faker->sentence();
            $newDeck->price = $faker->randomFloat(2, 1, 1000);

            $newDeck->save();
        }
    }
}
