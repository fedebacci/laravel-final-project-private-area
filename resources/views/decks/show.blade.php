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
                <a href="{{ route('decks.setCards', $deck) }}" class="btn btn-success">
                    Set cards
                </a>                             
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
                            @endphp
                            @foreach ($deck->cards as $card)
                                @php
                                    $total_price = $total_price + $card->price;    
                                @endphp
                            @endforeach
                            {{ $total_price != 0 ? 'Calc: € ' . $total_price : 'No price Available' }}
                        @endif
                    </p>
                    <p>
                        Game: {{ $deck->game->name }}
                    </p>

                    @if ($deck->cards) 
                        @php
                            $deck->cards = $deck->cards->sortBy('id');
                        @endphp
                        <p class="mb-0">
                            Assigned cards: {{ count($deck->cards) }}
                        </p>
                        @if (!$deck->cards->isEmpty())
                            <ul>
                                @foreach ($deck->cards as $card)
                                    <li>{{$card->name}}</li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection