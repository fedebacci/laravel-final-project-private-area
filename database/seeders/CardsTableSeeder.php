<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        // $pokerCards = [
        //     'A♠', '2♠', '3♠', '4♠', '5♠', '6♠', '7♠', '8♠', '9♠', '10♠', 'J♠', 'Q♠', 'K♠',
        //     'A♥', '2♥', '3♥', '4♥', '5♥', '6♥', '7♥', '8♥', '9♥', '10♥', 'J♥', 'Q♥', 'K♥',
        //     'A♦', '2♦', '3♦', '4♦', '5♦', '6♦', '7♦', '8♦', '9♦', '10♦', 'J♦', 'Q♦', 'K♦',
        //     'A♣', '2♣', '3♣', '4♣', '5♣', '6♣', '7♣', '8♣', '9♣', '10♣', 'J♣', 'Q♣', 'K♣'
        // ];

        $pokerId = Game::where('name', 'Poker')->first()->id;
        $pokerCards = [
            [
                'name' => 'A♠',
                'description' => 'Ace of Spades',
            ],
            [
                'name' => '2♠',
                'description' => 'Two of Spades',
            ],
            [
                'name' => '3♠',
                'description' => 'Three of Spades',
            ],
            [
                'name' => '4♠',
                'description' => 'Four of Spades',
            ],
            [
                'name' => '5♠',
                'description' => 'Five of Spades',
            ],
            [
                'name' => '6♠',
                'description' => 'Six of Spades',
            ],
            [
                'name' => '7♠',
                'description' => 'Seven of Spades',
            ],
            [
                'name' => '8♠',
                'description' => 'Eight of Spades',
            ],
            [
                'name' => '9♠',
                'description' => 'Nine of Spades',
            ],
            [
                'name' => '10♠',
                'description' => 'Ten of Spades',
            ],
            [
                'name' => 'J♠',
                'description' => 'Jack of Spades',
            ],
            [
                'name' => 'Q♠',
                'description' => 'Queen of Spades',
            ],
            [
                'name' => 'K♠',
                'description' => 'King of Spades',
            ],
            [
                'name' => 'A♥',
                'description' => 'Ace of Hearts',
            ],
            [
                'name' => '2♥',
                'description' => 'Two of Hearts',
            ],
            [
                'name' => '3♥',
                'description' => 'Three of Hearts',
            ],
            [
                'name' => '4♥',
                'description' => 'Four of Hearts',
            ],
            [
                'name' => '5♥',
                'description' => 'Five of Hearts',
            ],
            [
                'name' => '6♥',
                'description' => 'Six of Hearts',
            ],
            [
                'name' => '7♥',
                'description' => 'Seven of Hearts',
            ],
            [
                'name' => '8♥',
                'description' => 'Eight of Hearts',
            ],
            [
                'name' => '9♥',
                'description' => 'Nine of Hearts',
            ],
            [
                'name' => '10♥',
                'description' => 'Ten of Hearts',
            ],
            [
                'name' => 'J♥',
                'description' => 'Jack of Hearts',
            ],
            [
                'name' => 'Q♥',
                'description' => 'Queen of Hearts',
            ],
            [
                'name' => 'K♥',
                'description' => 'King of Hearts',
            ],
            [
                'name' => 'A♦',
                'description' => 'Ace of Diamonds',
            ],
            [
                'name' => '2♦',
                'description' => 'Two of Diamonds',
            ],
            [
                'name' => '3♦',
                'description' => 'Three of Diamonds',
            ],
            [
                'name' => '4♦',
                'description' => 'Four of Diamonds',
            ],
            [
                'name' => '5♦',
                'description' => 'Five of Diamonds',
            ],
            [
                'name' => '6♦',
                'description' => 'Six of Diamonds',
            ],
            [
                'name' => '7♦',
                'description' => 'Seven of Diamonds',
            ],
            [
                'name' => '8♦',
                'description' => 'Eight of Diamonds',
            ],
            [
                'name' => '9♦',
                'description' => 'Nine of Diamonds',
            ],
            [
                'name' => '10♦',
                'description' => 'Ten of Diamonds',
            ],
            [
                'name' => 'J♦',
                'description' => 'Jack of Diamonds',
            ],
            [
                'name' => 'Q♦',
                'description' => 'Queen of Diamonds',
            ],
            [
                'name' => 'K♦',
                'description' => 'King of Diamonds',
            ],
            [
                'name' => 	'A♣',
                'description' => 	'Ace of Clubs',
            ],
            [
                'name' => 	'2♣',
                'description' => 	'Two of Clubs',
            ],
            [
                'name' => 	'3♣',
                'description' => 	'Three of Clubs',
            ],
            [
                'name' => 	'4♣',
                'description' => 	'Four of Clubs',
            ],
            [
                'name' => 	'5♣',
                'description' => 	'Five of Clubs',
            ],
            [
                'name' => 	'6♣',
                'description' => 	'Six of Clubs',
            ],
            [
                'name' => 	'7♣',
                'description' => 	'Seven of Clubs',
            ],
            [
                'name' => 	'8♣',
                'description' => 	'Eight of Clubs',
            ],
            [
                'name' => 	'9♣',
                'description' => 	'Nine of Clubs',
            ],
            [
                'name' => 	'10♣',
                'description' => 	'Ten of Clubs',
            ],
            [
                'name' => 	'J♣',
                'description' => 	'Jack of Clubs',
            ],
            [
                'name' => 	'Q♣',
                'description' => 	'Queen of Clubs',
            ],
            [
                'name' => 	'K♣',
                'description' => 	'King of Clubs',
            ],
            [
                'name' => 'Red Joker',
                'description' => 'Red Joker Card',
            ],
            [
                'name' => 'Black Joker',
                'description' => 'Black Joker Card',
            ],
        ];

        $pokemonId = Game::where('name', 'Pokemon')->first()->id;
        $pokemonCards = [
            [
                'name' => 'Pikachu',
                'description' => 'Electric Mouse Pokemon (base)',
                'image' => 'https://pkmncards.com/wp-content/uploads/en_US-Promo_SWSH-SWSH153-pikachu.jpeg',
                'price' => $faker->randomFloat(2, 0, 10),
            ],
            [
                'name' => 'Raichu',
                'description' => 'Electric Mouse Pokemon (phase 1)',
                'price' => $faker->randomFloat(2, 0, 10),
            ],
            [
                'name' => 'Charmander',
                'description' => 'Flame Dragon Pokemon (base)',
            ],
            [
                'name' => 'Charmeleon',
                'description' => 'Flame Dragon Pokemon (phase 1)',
            ],
            [
                'name' => 'Charizard',
                'description' => 'Flame Dragon Pokemon (phase 2)',
            ],
            [
                'name' => 'Squirtle',
                'description' => 'Water Turtoise Pokemon (base)',
            ],
            [
                'name' => 'Wartortle',
                'description' => 'Water Turtoise Pokemon (phase 1)',
            ],
            [
                'name' => 'Blastoise',
                'description' => 'Water Turtoise Pokemon (phase 2)',
            ],
            [
                'name' => 'Turtwig',
                'description' => 'Leaf Turtle Pokemon (base)',
            ],
            [
                'name' => 'Grotle',
                'description' => 'Leaf Turtle Pokemon (phase 1)',
            ],
            [
                'name' => 'Torterra',
                'description' => 'Leaf Turtle Pokemon (phase 2)',
            ],
        ];
        // for ($i = 0; $i < 5; $i++) {
        //     $pokemonCards[] = [
        //         'name' => $faker->word(),
        //         'description' => $faker->sentence(),
        //         'price' => $faker->randomFloat(2, 1, 1000),
        //     ];
        // }




        foreach ($pokerCards as $cardData) {
            $newCard = new Card();

            $newCard->game_id = $pokerId;
            $newCard->name = $cardData['name'];
            $newCard->description = $cardData['description'] ?? null;
            $newCard->price = $cardData['price'] ?? null;
            $newCard->image = $cardData['image'] ?? null;
            $newCard->edition = $cardData['edition'] ?? null;

            $newCard->save();
        }
        foreach ($pokemonCards as $cardData) {
            $newCard = new Card();

            $newCard->game_id = $pokemonId;
            $newCard->name = $cardData['name'];
            $newCard->description = $cardData['description'] ?? null;
            $newCard->price = $cardData['price'] ?? null;
            $newCard->image = $cardData['image'] ?? null;
            $newCard->edition = $cardData['edition'] ?? null;

            $newCard->save();
        }

    }
}
