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
                            <input value="{{ $card->name }}" type="text" name="name" id="name" class="form-control" required pattern="\S(.*\S)?">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">
                                Card description
                            </label>
                            <textarea name="description" id="description" class="form-control">{{ $card->description }}</textarea>
                        </div>

                        {{-- - 2 possibilities: don't show the input if original card has no image or check presence in update route --}}
                        {{-- - The first has the problem of not allowing to set an image if not set during creation, I'll try the second --}}
                        {{-- @if ($card->image)
                            <div class="col-12">
                                <label for="image" class="form-label">
                                    Card image
                                </label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        @endif --}}
                        <div class="col-12">
                            <label for="image" class="form-label">
                                Card image
                            </label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>



                        <div class="col-12">
                            <label class="form-label">
                                Card game
                            </label>
                            <select name="game_id" id="game_id" class="form-select" required>
                                @foreach ($games as $game)
                                    <option value="{{ $game->id }}" {{ $card->game_id == $game->id ? 'selected' : '' }}>{{ $game->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            @php
                                dump($card->id);
                                dump($card->name);
                                dump($card->price);
                                dump('___ Starting foreach ___');

                                $minCardPrice = 0;
                                foreach($card->decks as $deck) {
                                    dump('_ new foreach for deck _ ' . $deck->name);
                                    $otherCardsValue = 0;
                                    foreach ($deck->cards as $currentCard) {
                                        if ($currentCard->id != $card->id) {
                                            $otherCardsValue += $currentCard->price;
                                        }
                                    }
                                    // dump('otherCardsValue: ' . $otherCardsValue);
                                    // dump('$deck->price: ' . $deck->price);
                                    // $difference = $otherCardsValue - $deck->price;
                                    dump('$deck->price: ' . $deck->price);
                                    dump('otherCardsValue: ' . $otherCardsValue);
                                    $difference = $deck->price - $otherCardsValue;
                                    dump('difference: ' . $difference);
                                    dump('minCardPrice before check: ' . $minCardPrice);
                                    if ($deck->price && ($minCardPrice == 0 || $difference > $minCardPrice)) {
                                        $minCardPrice = $difference;
                                    }
                                }

                                dump('___ Ending foreach ___');
                                dump('FINAL minCardPrice: ' . $minCardPrice);                              
                                dump('FINAL minCardPrice: ' . number_format($minCardPrice, 2));                              
                            @endphp
                            <label for="price" class="form-label">
                                Card price {{$card->name}} {{$card->price}} (min: {{$minCardPrice}})
                            </label>
                            {{-- <input value="{{ $card->price }}" type="number" name="price" id="price" class="form-control" min="0" max="1000" step=".01"> --}}
                            <input value="{{ $card->price }}" type="number" name="price" id="price" class="form-control" min="{{ number_format($minCardPrice, 2) }}" max="1000" step=".01">
                        </div>
                        <div class="col-12">
                            <label for="edition" class="form-label">
                                Card edition {{$card->name}} {{$card->price}}
                            </label>
                            <input value="{{ $card->edition }}" type="text" name="edition" id="edition" class="form-control" pattern="\S(.*\S)?">
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