@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Create Card')

@section('content')
    <section id="cards-create-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Create Card') }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Back to the dashboard
                </a>
                <a href="{{ route('cards.index') }}" class="btn btn-secondary">
                    Back to Cards List
                </a>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">
                        Create a new card
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-secondary">
                        Fields marked with * are required.
                    </p>
                    <form action="{{ route('cards.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="name" class="form-label">
                                * Card name
                            </label>
                            <input type="text" name="name" id="name" class="form-control" required pattern="\S(.*\S)?">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">
                                Card description
                            </label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
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
                                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="price" class="form-label">
                                Card price
                            </label>
                            <input type="number" name="price" id="price" class="form-control" min="0" max="1000" step=".01">
                        </div>
                        <div class="col-12">
                            <label for="edition" class="form-label">
                                Card edition
                            </label>
                            <input type="text" name="edition" id="edition" class="form-control" pattern="\S(.*\S)?">
                        </div>


                        <div class="col-12">
                            <input type="submit" value="Create card" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection