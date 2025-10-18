@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Set Deck Cards')

@section('content')
    <section id="decks-create-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Set Deck Cards') }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Back to the dashboard
                </a>
                <a href="{{ route('decks.index') }}" class="btn btn-secondary">
                    Back to Decks List
                </a>
                <a href="{{ route('decks.show', $deck->id) }}" class="btn btn-secondary">
                    Back to Selected Deck
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

            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">
                        Set deck cards for: {{ $deck->name }} ({{ $deck->id }})
                    </h5>
                </div>
                <div class="card-body">

                    {{-- @dump($availableCards) --}}
                    @if (count($availableCards) > 0)
                        <form action="{{ route('decks.updateDeckCards', $deck) }}" method="POST" class="row g-3">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label class="d-block">
                                    Contained cards
                                </label>
                                @foreach ($availableCards as $availableCard)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="availableCard-{{ $availableCard->id }}" value="{{ $availableCard->id }}" name="cards[]" {{ $deck->cards->contains($availableCard->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="availableCard-{{ $availableCard->id }}">{{ $availableCard->name }}</label>
                                    </div>
                                @endforeach
                            </div>


                            <div class="col-12">
                                <input type="submit" value="Set deck cards" class="btn btn-success">
                            </div>
                        </form>
                    @else
                        <p class="alert alert-warning m-0">
                            There are no cards available for this game.
                            <br />
                            Please 
                            <a href="{{ route('cards.create') }}" class="text-decoration-none">
                                create some new cards
                            </a>
                            and assign them to the same game assigned to this deck: 
                            <a href="{{ route('games.show', $deck->game_id) }}" class="text-decoration-none">
                                {{ $deck->game->name }}
                            </a>
                        </p>
                    @endif


                </div>
            </div>

        </div>
    </section>
@endsection