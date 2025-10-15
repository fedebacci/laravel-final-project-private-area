@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Cards List')

@section('content')
    <section id="cards-index-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Cards List') }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Back to the dashboard
                </a>
                <a href="{{ route('cards.create') }}" class="btn btn-primary">
                    Create new Card
                </a>
            </div>

            @if ($cards->isEmpty())
                <div class="alert alert-warning">
                    No cards found.
                </div>
            @else
                {{ $cards->links() }}
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                Id
                            </th>
                            <th scope="col">
                                Image
                            </th>
                            <th scope="col">
                                Name
                            </th>
                            <th scope="col">
                                Description
                            </th>
                            <th scope="col">
                                Game
                            </th>
                            <th scope="col">
                                Associated decks
                            </th>
                            <th scope="col">
                                Price
                            </th>
                            <th scope="col">
                                Edition
                            </th>
                            <th scope="col">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($cards as $card)
                            <tr>
                                <th scope="row">
                                    {{ $card->id }}
                                </th>
                                <td>
                                    @if ($card->image)
                                        {{-- <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->name }} Image"> --}}
                                        {{-- - Temporary for testing without images management --}}
                                        <img src="{{ $card->image }}" alt="{{ $card->name }} Image" class="card-image">
                                    @else
                                        No image Available
                                    @endif
                                </td>
                                <td>
                                    {{ $card->name }}
                                </td>
                                <td>
                                    @if ($card->description)
                                        {{ $card->description }}
                                        {{-- {{ Str::limit($card->description, 50) }} --}}
                                    @else
                                        No Description
                                    @endif
                                </td>
                                <td>
                                    @if ($card->game)
                                        Game: {{ $card->game->name }}
                                    @else
                                        No game assigned (error)
                                    @endif
                                </td>
                                <td>
                                    @if ($card->decks)
                                        Decks: {{ count($card->decks) }}
                                    @else
                                        No decks assigned
                                    @endif
                                </td>
                                <td>
                                    @if ($card->price)
                                        € {{ $card->price }}
                                    @else
                                        No price Available
                                    @endif
                                </td>
                                <td>
                                    @if ($card->edition)
                                        {{ $card->edition }}
                                    @else
                                        No edition Available
                                    @endif
                                </td>
                                <td>
                                    {{-- Actions here --}}
                                    <a href="{{ route('cards.show', $card) }}" class="btn btn-primary btn-sm">
                                        View
                                    </a>
                                    <a href="{{ route('cards.edit', $card) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    {{-- <form action="{{ route('cards.destroy', $card) }}" method="POST" style="display: inline-block;">
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