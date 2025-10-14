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
        foreach ($availableDecks as $availableDeck) {
            $availableCardsIds = Card::where('game_id', $availableDeck->game_id)->get()->pluck('id')->toArray();
            if (count($availableCardsIds) != 0 && $availableDeck->game_id == 1) {
                // - If game_id == 1 it is a Poker deck, so it has all available cards
                for ($i = 0; $i < count($availableCardsIds); $i++) {
                    $cardDeckRelations[] = [
                        'card_id' => $availableCardsIds[$i],
                        'deck_id' => $availableDeck->id,
                    ];
                }
            } else if (count($availableCardsIds) != 0) {
                // - If game_id != 1 it is NOT a Poker deck, so it can have random cards
                for ($i = 0; $i < count($availableCardsIds); $i++) {
                    // - Ensuring Decks have the first two cards (which have realistic names)
                    if ($i <= 1) {
                        $cardId = $availableCardsIds[$i];
                    } else {
                        $cardId = $availableCardsIds[array_rand($availableCardsIds)];
                    }
                    $cardDeckRelations[] = [
                        'card_id' => $cardId,
                        'deck_id' => $availableDeck->id,
                    ];
                }
            }
        }
        // - Remove duplicates if necessary
        $cardDeckRelations = array_unique($cardDeckRelations, SORT_REGULAR);
        DB::table('card_deck')->insert($cardDeckRelations);
    }
}
