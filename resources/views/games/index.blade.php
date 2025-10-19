@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Games List')

@section('content')
    <section id="games-index-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Games List') }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Back to the dashboard
                </a>
                <a href="{{ route('games.create') }}" class="btn btn-primary">
                    Create new Game
                </a>
            </div>



            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>
                                <pre class="error">{{ $error }}</pre>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <form action="{{ route('games.index') }}" method="GET" class="row g-3">
                @csrf
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="submit" value="Search" class="btn btn-outline-success">
                        <input value="{{ $searchValue }}" name="search" type="text" class="form-control" placeholder="Search by name">
                    </div>
                </div>
            </form>

            @if ($games->isEmpty())
                <div class="alert alert-warning">
                    No games found.
                </div>
            @else
                {{ $games->links() }}
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
                                        <img src="{{ asset('storage/' . $game->logo) }}" alt="{{ $game->name }} Logo" class="game-logo">
                                    @else
                                        No Logo
                                    @endif
                                </td>
                                <td>
                                    {{ $game->name }}
                                </td>
                                <td>
                                    @if ($game->description)
                                        @if (strlen($game->description) <= 100)                                            
                                            {{ $game->description }}
                                        @else                                            
                                            {{ substr($game->description, 0, 100) . '...' }}
                                        @endif
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
                                    {{-- <div class="d-flex flex-nowrap gap-1"> --}}
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('games.show', $game) }}" class="btn btn-primary btn-sm">
                                            View
                                        </a>
                                        <a href="{{ route('games.edit', $game) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <x-delete-resource-button-modal>
                                            <x-slot:button_class>btn-sm</x-slot>
                                            <x-slot:resource_id>{{ $game->id }}</x-slot>
                                            <x-slot:resource_name>{{ $game->name }}</x-slot>
                                            <x-slot:resource_type>game</x-slot>
                                        </x-delete-resource-button-modal>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection