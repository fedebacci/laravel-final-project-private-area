@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Game: ' . $game->name)

@section('content')
    <section id="games-show-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Game: ' . $game->name) }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('games.index') }}" class="btn btn-secondary">
                    Back to Games List
                </a>
                <a href="{{ route('games.edit', $game) }}" class="btn btn-warning">
                    Edit Game
                </a>
                <x-delete-resource-button-modal>
                    <x-slot:button_class></x-slot>
                    <x-slot:resource_id>{{ $game->id }}</x-slot>
                    <x-slot:resource_name>{{ $game->name }}</x-slot>
                    <x-slot:resource_type>game</x-slot>
                </x-delete-resource-button-modal>                
            </div>

            <div class="card">
                <div class="card-header">
                    {{ $game->name }}
                </div>
                <div class="card-body">
                    @if ($game->logo)
                        <img src="{{ asset('storage/' . $game->logo) }}" alt="{{ $game->name }} Logo" class="game-logo mb-3">
                    @endif
                    <p>
                        {{ $game->description ?? 'No Description Available.' }}
                    </p>

                    <p class="mb-0">
                        Available decks: {{ count($game->decks) }}
                    </p>
                    @if (!$game->decks->isEmpty())
                        <ul>
                            @foreach ($game->decks as $deck)
                                <li>{{$deck->name}}</li>
                            @endforeach
                        </ul>
                    @endif

                    <p class="mb-0">
                        Assigned cards: {{ count($game->cards) }}
                    </p>
                    @if (!$game->cards->isEmpty())
                        <ul>
                            @foreach ($game->cards as $card)
                                <li>{{$card->name}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection