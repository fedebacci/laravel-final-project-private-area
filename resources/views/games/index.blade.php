@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Games List')

@section('content')
    <section id="games-index-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Games List') }}
            </h2> --}}

            @if ($games->isEmpty())
                <div class="alert alert-warning">
                    No games found.
                </div>
            @else
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                Id
                            </th>
                            <th scope="col">
                                Logo
                            </th>
                            <th scope="col">
                                Name
                            </th>
                            <th scope="col">
                                Description
                            </th>
                            <th scope="col">
                                Number of cards
                            </th>
                            <th scope="col">
                                Number of decks
                            </th>
                            <th scope="col">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($games as $game)
                            <tr>
                                <th scope="row">
                                    {{ $game->id }}
                                </th>
                                <td>
                                    @if ($game->logo)
                                        {{-- <img src="{{ asset('storage/' . $game->logo) }}" alt="{{ $game->name }} Logo"> --}}
                                        {{-- - Temporary for testing without images management --}}
                                        <img src="{{ $game->logo }}" alt="{{ $game->name }} Logo" class="game-logo">
                                    @else
                                        No Logo
                                    @endif
                                </td>
                                <td>
                                    {{ $game->name }}
                                </td>
                                <td>
                                    @if ($game->description)
                                        {{ $game->description }}
                                        {{-- {{ Str::limit($game->description, 50) }} --}}
                                    @else
                                        No Description
                                    @endif
                                </td>
                                <td>
                                    @if ($game->cards) 
                                        {{ count($game->cards) }}
                                    @endif
                                </td>
                                <td>
                                    @if ($game->decks) 
                                        {{ count($game->decks) }}
                                    @endif
                                </td>
                                <td>
                                    {{-- Actions here --}}
                                    <a href="{{ route('games.show', $game) }}" class="btn btn-primary btn-sm">
                                        View
                                    </a>
                                    {{-- <a href="{{ route('games.edit', $game) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a> --}}
                                    {{-- <form action="{{ route('games.destroy', $game) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this game?')">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection