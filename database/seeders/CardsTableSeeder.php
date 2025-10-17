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
                'image' => 'cards/en_US-Promo_SWSH-SWSH153-pikachu.jpeg',
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
                'price' => $faker->randomFloat(2, 0, 10),
            ],
            [
                'name' => 'Charizard',
                'description' => 'Flame Dragon Pokemon (phase 2)',
            ],
            [
                'name' => 'Squirtle',
                'description' => 'Water Turtoise Pokemon (base)',
                'price' => $faker->randomFloat(2, 0, 10),
            ],
            [
                'name' => 'Wartortle',
                'description' => 'Water Turtoise Pokemon (phase 1)',
            ],
            [
                'name' => 'Blastoise',
                'description' => 'Water Turtoise Pokemon (phase 2)',
                'price' => $faker->randomFloat(2, 0, 10),
            ],
            [
                'name' => 'Turtwig',
                'description' => 'Leaf Turtle Pokemon (base)',
            ],
            [
                'name' => 'Grotle',
                'description' => 'Leaf Turtle Pokemon (phase 1)',
                'price' => $faker->randomFloat(2, 0, 10),
            ],
            [
                'name' => 'Torterra',
                'description' => 'Leaf Turtle Pokemon (phase 2)',
            ],
        ];


        // # Site with cards, prices and decks (+ images) to look at https://deckbox.org/games/mtg/cards
        $magicTheGatheringId = Game::where('name', 'Magic: The Gathering')->first()->id;
        $magicTheGatheringCards = [
            // [
            //     'name' => '',
            //     'description' => '',
            //     'image' => 'cards/',
            //     'price' => $faker->randomFloat(2, 0, 10),
            // ],
            [
                'name' => '"Brims" Barone, Midway Mobster',
                'description' => 'Legendary Creature - Human Rogue',
                'image' => 'cards/Brims-Barone-Midway-Mobster.jpg',
                'price' => 0.06,
            ],
            [
                'name' => '"Lifetime" Pass Holder',
                'description' => 'Creature - Zombie Guest',
                'image' => 'cards/Lifetime-Pass-Holder.jpg',
                'price' => 0.2,
            ],            
            [
                'name' => '"Rumors of My Death..."',
                'description' => 'Enchantment',
                'image' => 'cards/Rumors-Of-My-Death.jpg',
                'price' => 0.12,
            ],            
            [
                'name' => '+2 Mace',
                'description' => 'Artifact - Equipment',
                'image' => 'cards/Plus-2-Mace.jpg',
                'price' => .07,
            ],            
            [
                'name' => '1996 World Champion',
                'description' => 'Summon - Legend',
                'image' => 'cards/1996-World-Champion.jpg',
                'price' => $faker->randomFloat(2, 0, 10),
            ],            
            [
                'name' => 'A Display of My Dark Power',
                'description' => 'Scheme',
                'image' => 'cards/A-Display-Of-My-Dark-Power.jpg',
                'price' => 20.3,
            ],            
        ];


        // # Sites with data for cards and decks:
            // https://www.db.yugioh-card.com/yugiohdb/card_list.action?request_locale=it -> Decks
            // https://ygoprodeck.com/card-database/?num=24&offset=0 -> Cards with images and prices
        $yuGiOhId = Game::where('name', 'Yu-Gi-Oh!')->first()->id;
        $yuGiOhCards = [
            // [
            //     'name' => '',
            //     'description' => '',
            //     'image' => 'cards/',
            //     'price' => $faker->randomFloat(2, 0, 10),
            // ],            
            [
                'name' => 'Ten Thousand Dragon',
                'description' => 'Cannot be Normal Summoned/Set. Must be Special Summoned by Tributing monsters you control whose combined ATK & DEF is 10,000 or more. If Summoned this way, the ATK/DEF of this card becomes 10,000.',
                'image' => 'cards/Ten-Thousand-Dragon.jpg',
                'price' => 707.54,
            ],            
            [
                'name' => 'Elemental HERO Wildheart',
                'description' => 'This card is unaffected by Trap effects.',
                'image' => 'cards/Elemental-HERO-Wildheart.jpg',
                'price' => 48.35,
            ],            
            [
                'name' => 'Tri-Brigade Fraktall',
                'description' => 'You can send this card from your hand or field to the GY; send 1 Level 3 or lower Beast, Beast-Warrior, or Winged Beast monster from your Deck to the GY. You can banish any number of Beast, Beast-Warrior, and/or Winged Beast monsters in your GY; Special Summon 1 Beast, Beast-Warrior, or Winged Beast Link Monster from your Extra Deck, with Link Rating equal to the number banished, also you can only use Beast, Beast-Warrior, and Winged Beast monsters as Link Material for the rest of this turn. You can only use each effect of "Tri-Brigade Fraktall" once per turn.',
                'image' => 'cards/Tri-Brigade-Fraktall.jpg',
                'price' => 5.23,
            ],            
            [
                'name' => 'Slifer the Sky Dragon',
                'description' => "Requires 3 Tributes to Normal Summon (cannot be Normal Set). This card's Normal Summon cannot be negated. When Normal Summoned, cards and effects cannot be activated. Once per turn, during the End Phase, if this card was Special Summoned: Send it to the GY. Gains 1000 ATK/DEF for each card in your hand. If a monster(s) is Normal or Special Summoned to your opponent's field in Attack Position: That monster(s) loses 2000 ATK, then if its ATK has been reduced to 0 as a result, destroy it.",
                'image' => 'cards/Slifer-the-Sky-Dragon.jpg',
                'price' => 0.78,
            ],            
            [
                'name' => 'Magi Magi ☆ Magician Gal',
                'description' => "2 Level 6 Spellcaster monsters
Once per turn: You can detach 1 material from this card and banish 1 card from your hand to activate 1 of these effects.
● Target 1 monster your opponent controls; take control of that target until the End Phase of this turn.
● Target 1 monster in your opponent's GY; Special Summon that target.",
                'image' => 'cards/Magi-Magi-Magician-Gal.jpg',
            ],            
            [
                'name' => 'Elemental HERO Cosmo Neos',
                'description' => '"Elemental HERO Neos" + 3 "Neo-Spacian" monsters with different Attributes
Must first be Special Summoned (from your Extra Deck) by shuffling the above cards you control into the Deck. (You do not use "Polymerization".) If this card is Special Summoned from the Extra Deck: You can activate this effect; for the rest of this turn, your opponent cannot activate cards, also cards your opponent controls cannot activate their effects. Your opponent cannot activate cards or effects in response to this effect s activation. Once per turn, during the End Phase: Shuffle this card into the Extra Deck, and if you do, destroy all cards your opponent controls.',
                'image' => 'cards/Elemental-HERO-Cosmo-Neos.jpg',
                'price' => 1.06,
            ],            
            [
                'name' => 'Beast Rage',
                'description' => 'All monsters you control gain 200 ATK for each of your removed from play Beast-Type and Winged Beast-Type monsters.',
                'image' => 'cards/Beast-Rage.jpg',
                'price' => 0.13,
            ],            
            [
                'name' => 'Go! - D/D/D Divine Zero King Rage',
                'description' => 'If you would take effect damage, you take no damage. If you Normal Summon 1 Level 5 or higher "D/D" monster, you can do it without Tributing. You can only use each Pendulum Effect of "Go! - D/D/D Divine Zero King Rage" once per turn.',
                'image' => 'cards/Go-D-D-D-Divine-Zero-King-Rage.jpg',
                'price' => 4.44,
            ],            
            [
                'name' => 'Tri-Brigade Shuraig the Ominous Omen',
                'description' => '2+ Beast, Beast-Warrior, and/or Winged Beast monsters
If this card is Special Summoned, or if another Beast, Beast-Warrior, or Winged Beast monster(s) is Special Summoned to your field: You can banish 1 card on the field. If this card is sent to the GY: You can add 1 Beast, Beast-Warrior, or Winged Beast monster from your Deck to your hand, whose Level is less than or equal to the number of your banished Beast, Beast-Warrior, and Winged Beast monsters. You can only use each effect of "Tri-Brigade Shuraig the Ominous Omen" once per turn.',
                'image' => 'cards/Tri-Brigade-Shuraig-the-Ominous-Omen.jpg',
                'price' => 1.56,
            ],            
        ];




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
        foreach ($magicTheGatheringCards as $cardData) {
            $newCard = new Card();

            $newCard->game_id = $magicTheGatheringId;
            $newCard->name = $cardData['name'];
            $newCard->description = $cardData['description'] ?? null;
            $newCard->price = $cardData['price'] ?? null;
            $newCard->image = $cardData['image'] ?? null;
            $newCard->edition = $cardData['edition'] ?? null;

            $newCard->save();
        }
        foreach ($yuGiOhCards as $cardData) {
            $newCard = new Card();

            $newCard->game_id = $yuGiOhId;
            $newCard->name = $cardData['name'];
            $newCard->description = $cardData['description'] ?? null;
            $newCard->price = $cardData['price'] ?? null;
            $newCard->image = $cardData['image'] ?? null;
            $newCard->edition = $cardData['edition'] ?? null;

            $newCard->save();
        }

    }
}
