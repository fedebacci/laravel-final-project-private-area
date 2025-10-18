@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Edit Card')

@section('content')
    <section id="cards-create-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Edit Card') }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Back to the dashboard
                </a>
                <a href="{{ route('cards.index') }}" class="btn btn-secondary">
                    Back to Cards List
                </a>
                <a href="{{ route('cards.show', $card->id) }}" class="btn btn-secondary">
                    Back to Selected Card
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
                        Edit card {{ $card->name }} ({{ $card->id }})
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-secondary">
                        Fields marked with * are required.
                    </p>
                    <form action="{{ route('cards.update', $card->id) }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-12">
                            <label for="name" class="form-label">
                                * Card name
                            </label>
                            <input value="{{ old('name') != null ? old('name') : $card->name }}" type="text" name="name" id="name" class="form-control" required pattern="\S(.*\S)?">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">
                                Card description
                            </label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') != null ? old('description') : $card->description }}</textarea>
                        </div>
                        <div class="col-12">
                            <label for="image" class="form-label">
                                Card image
                            </label>
                            {{-- # Not possible for security reasons --}}
                            {{-- <input value="{{ old('image') }}" type="file" name="image" id="image" class="form-control"> --}}
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">
                                Card game
                            </label>
                            <select name="game_id" id="game_id" class="form-select" required>
                                @foreach ($games as $game)
                                    @php
                                        $isSelected = false;
                                        if ((old('game_id') != null && old('game_id') == $game->id) || $card->game_id == $game->id) {
                                            $isSelected = true;
                                        }
                                    @endphp                                
                                    <option value="{{ $game->id }}" {{ $isSelected == true ? 'selected' : '' }}>{{ $game->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            @php
                                $minCardPrice = 0;
                                foreach($card->decks as $deck) {
                                    $otherCardsValue = 0;
                                    foreach ($deck->cards as $currentCard) {
                                        // - Could also add all cards and subtract $card->price in $difference to avoid this if statement
                                        if ($currentCard->id != $card->id) {
                                            $otherCardsValue += $currentCard->price;
                                        }
                                    }
                                    $difference = $deck->price - $otherCardsValue;
                                    if ($deck->price && ($minCardPrice == 0 || $difference > $minCardPrice)) {
                                        $minCardPrice = $difference;
                                    }
                                }                          
                            @endphp
                            <label for="price" class="form-label">
                                Card price {{$card->name}} {{$card->price}} (min: {{$minCardPrice}})
                            </label>
                            <input value="{{ old('price') != null ? old('price') : $card->price }}" type="number" name="price" id="price" class="form-control" min="{{ number_format($minCardPrice, 2) }}" max="1000" step=".01">
                        </div>
                        <div class="col-12">
                            <label for="edition" class="form-label">
                                Card edition {{$card->name}} {{$card->price}}
                            </label>
                            <input value="{{ old('edition') != null ? old('edition') : $card->edition }}" type="text" name="edition" id="edition" class="form-control" pattern="\S(.*\S)?">
                        </div>


                        <div class="col-12">
                            <input type="submit" value="Edit card" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection