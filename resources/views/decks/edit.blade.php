@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Edit Deck')

@section('content')
    <section id="decks-create-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Edit Deck') }}
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
                        Edit deck {{ $deck->name }} ({{ $deck->id }})
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-secondary">
                        Fields marked with * are required.
                    </p>
                    <form action="{{ route('decks.update', $deck->id) }}" method="POST" class="row g-3">
                        @csrf
                        @method('PUT')

                        <div class="col-12">
                            <label for="name" class="form-label">
                                * Deck name
                            </label>
                            <input value="{{ old('name') != null ? old('name') : $deck->name }}" type="text" name="name" id="name" class="form-control" required pattern="\S(.*\S)?">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">
                                Deck description
                            </label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') != null ? old('description') : $deck->description }}</textarea>
                        </div>



                        <div class="col-12">
                            <label class="form-label">
                                Deck game
                            </label>
                            <select name="game_id" id="game_id" class="form-select" required>
                                @foreach ($games as $game)
                                    @php
                                        $isSelected = false;
                                        if ((old('game_id') != null && old('game_id') == $game->id) || $deck->game_id == $game->id) {
                                            $isSelected = true;
                                        }
                                    @endphp
                                    <option value="{{ $game->id }}" {{ $isSelected == true ? 'selected' : '' }}>{{ $game->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            @php
                                $maxDeckPrice = 0;
                                foreach($deck->cards as $card) {
                                    $maxDeckPrice += $card->price;
                                }
                                $maxDeckPrice = $maxDeckPrice <= 10000 ? $maxDeckPrice : 10000;
                            @endphp
                            <label for="price" class="form-label">
                                {{-- Deck price (max: {{ $maxDeckPrice != 0 ? $maxDeckPrice : 10000 }}) --}}
                                Deck price (max: {{ $maxDeckPrice }})
                            </label>                            
                            {{-- <input value="{{ old('price') != null ? old('price') : $deck->price }}" type="number" name="price" id="price" class="form-control" min="0" max="{{ $maxDeckPrice != 0 ? $maxDeckPrice : 10000 }}" step=".01"> --}}
                            <input value="{{ old('price') != null ? old('price') : $deck->price }}" type="number" name="price" id="price" class="form-control" min="0" max="{{ $maxDeckPrice }}" step=".01">
                        </div>


                        <div class="col-12">
                            <label class="d-block">
                                Contained cards
                            </label>
                            @forelse ($availableCards as $availableCard)
                                {{-- <div class="form-check form-check-inline"> --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="availableCard-{{ $availableCard->id }}" value="{{ $availableCard->id }}" name="cards[]" {{ $deck->cards->contains($availableCard->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="availableCard-{{ $availableCard->id }}">{{ $availableCard->name }} (TMP: {{ $availableCard->price }})</label>
                                </div>
                            @empty
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
                            @endforelse
                        </div>


                        <div class="col-12">
                            <input type="submit" value="Edit deck" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection