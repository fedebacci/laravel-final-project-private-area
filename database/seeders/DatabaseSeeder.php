<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Deck;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GamesTableSeeder::class);
        $this->call(CardsTableSeeder::class);
        $this->call(DecksTableSeeder::class);


        // # Seeding table for Many to Many relations between Cards and Decks
        $availableDecks = Deck::all();
        $cardDeckRelations = [];
        // dump('There are: ' . count($availableDecks) . ' decks');
        
        foreach ($availableDecks as $availableDeck) {

            // dump('____ Deck: ' . $availableDeck->name . ' (' . $availableDeck->id . '), ' . '____ game_id: ' . $availableDeck->game_id);

            $availableCardsIds = Card::where('game_id', $availableDeck->game_id)->get()->pluck('id')->toArray();
            // dump($availableCardsIds);

            if (count($availableCardsIds) != 0) {
                // dump('There are available cards');
                for ($i = 0; $i < count($availableCardsIds); $i++) {
                    $cardId = $availableCardsIds[array_rand($availableCardsIds)];
                    $cardDeckRelations[] = [
                        'card_id' => $cardId,
                        'deck_id' => $availableDeck->id,
                    ];
                }
            } else {
                // dump('No cards available');
            }
        }

        // - Remove duplicates if necessary
        $cardDeckRelations = array_unique($cardDeckRelations, SORT_REGULAR);
        // dump($cardDeckRelations);
        DB::table('card_deck')->insert($cardDeckRelations);
    }
}
