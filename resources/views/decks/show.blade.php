@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Deck: ' . $deck->name)

@section('content')
    <section id="decks-show-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Deck: ' . $deck->name) }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('decks.index') }}" class="btn btn-secondary">
                    Back to Decks List
                </a>
                <a href="{{ route('decks.edit', $deck) }}" class="btn btn-warning">
                    Edit Deck
                </a>
                <x-delete-resource-button-modal>
                    <x-slot:button_class></x-slot>
                    <x-slot:resource_id>{{ $deck->id }}</x-slot>
                    <x-slot:resource_name>{{ $deck->name }}</x-slot>
                    <x-slot:resource_type>deck</x-slot>
                </x-delete-resource-button-modal>                                        
            </div>

            <div class="card">
                <div class="card-header">
                    {{ $deck->name }}
                </div>
                <div class="card-body">
                    <p>
                        {{ $deck->description ?? 'No Description Available.' }}
                    </p>
                    <p>
                        @if ($deck->price)
                            € {{ $deck->price }}
                        @else
                            @php
                                $total_price = 0;    
                                foreach ($deck->cards as $card) {
                                    $total_price = $total_price + $card->price;    
                                }
                            @endphp
                            {{ $total_price != 0 ? 'Calc: € ' . $total_price : 'No price Available' }}
                        @endif
                    </p>
                    <p>
                        Game: 
                        <a href="{{ route('games.show', $deck->game->id) }}" class="text-decoration-none">
                            {{ $deck->game->name }}
                        </a>
                    </p>

                    @if ($deck->cards) 
                        @php
                            $deck->cards = $deck->cards->sortBy('id');
                        @endphp
                        <p class="mb-0">
                            Assigned cards: {{ count($deck->cards) }}

                            @php
                                $cardsValue = 0;
                                foreach ($deck->cards as $cardForPrice) {
                                    $cardsValue += $cardForPrice->price;
                                }
                            @endphp
                            (TMP: {{$cardsValue}})
                        </p>
                        @if (!$deck->cards->isEmpty())
                            <ul>
                                @foreach ($deck->cards as $card)
                                    <li>
                                        <a href="{{ route('cards.show', $card->id) }}" class="text-decoration-none">
                                            {{$card->name}}
                                        </a>
                                         (TMP: € {{$card->price}})
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection