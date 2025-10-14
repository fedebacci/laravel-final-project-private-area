@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Deck: ' . $deck->name)

@section('content')
    <section id="decks-show-content">
        <div class="container">
            <h2 class="fs-4 text-secondary my-4">
                {{ __('Deck: ' . $deck->name) }}
            </h2>

            <div class="d-flex">
                <a href="{{ route('decks.index') }}" class="btn btn-secondary me-2 mb-3">
                    Back to Decks List
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
                        € {{ $deck->price }}
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