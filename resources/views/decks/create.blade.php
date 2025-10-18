@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Create Deck')

@section('content')
    <section id="decks-create-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Create Deck') }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Back to the dashboard
                </a>
                <a href="{{ route('decks.index') }}" class="btn btn-secondary">
                    Back to Decks List
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
                        Create a new deck
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-secondary">
                        Fields marked with * are required.
                    </p>
                    <form action="{{ route('decks.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="name" class="form-label">
                                * Deck name
                            </label>
                            <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control" required pattern="\S(.*\S)?">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">
                                Deck description
                            </label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">
                                Deck game
                            </label>
                            <select name="game_id" id="game_id" class="form-select" required>
                                @foreach ($games as $game)
                                    @php
                                        $isSelected = false;
                                        if ((old('game_id') != null && old('game_id') == $game->id)) {
                                            $isSelected = true;
                                        }
                                    @endphp                                
                                    <option value="{{ $game->id }}" {{ $isSelected == true ? 'selected' : '' }}>{{ $game->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="price" class="form-label">
                                Deck price
                            </label>
                            <input value="{{ old('price') }}" type="number" name="price" id="price" class="form-control" min="0" max="1000" step=".01">
                        </div>


                        <div class="col-12">
                            <input type="submit" value="Create deck" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection