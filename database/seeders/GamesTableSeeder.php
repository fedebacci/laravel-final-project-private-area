<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $games = [
            [
                'name' => 'Poker',
            ],
            [
                'name' => 'Pokèmon',
                'description' => 'A card game based on collecting and battling creatures called Pokèmon.',
                // - Temporary for testing without images management
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Pok%C3%A9mon_Trading_Card_Game_logo.svg/2560px-Pok%C3%A9mon_Trading_Card_Game_logo.svg.png',
            ],
            [
                'name' => 'Magic: The Gathering',
            ],
            [
                'name' => 'Yu-Gi-Oh!',
                'description' => 'A strategic card game where players use monster, spell, and trap cards to defeat their opponents.',
            ],
        ];

        foreach ($games as $game) {
            $newGame = new Game();

            $newGame->name = $game['name'];
            $newGame->description = $game['description'] ?? null;
            $newGame->logo = $game['logo'] ?? null;

            $newGame->save();
        }
    }
}
