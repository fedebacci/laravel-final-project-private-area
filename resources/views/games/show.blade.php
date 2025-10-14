@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Game: ' . $game->name)

@section('content')
    <section id="games-show-content">
        <div class="container">
            <h2 class="fs-4 text-secondary my-4">
                {{ __('Game: ' . $game->name) }}
            </h2>

            <div class="d-flex">
                <a href="{{ route('games.index') }}" class="btn btn-secondary me-2 mb-3">
                    Back to Games List
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ $game->name }}
                </div>
                <div class="card-body">
                    @if ($game->logo)
                        {{-- <img src="{{ asset('storage/' . $game->logo) }}" alt="{{ $game->name }} Logo" class="mb-3"> --}}
                        {{-- - Temporary for testing without images management --}}
                        <img src="{{ $game->logo }}" alt="{{ $game->name }} Logo" class="game-logo mb-3">
                    @endif
                    <p>
                        {{ $game->description ?? 'No Description Available.' }}
                    </p>
                </div>
            </div>

        </div>
    </section>
@endsection