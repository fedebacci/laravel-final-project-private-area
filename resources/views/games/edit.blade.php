@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Edit Game')

@section('content')
    <section id="games-create-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Edit Game') }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Back to the dashboard
                </a>
                <a href="{{ route('games.index') }}" class="btn btn-secondary">
                    Back to Games List
                </a>
                <a href="{{ route('games.show', $game->id) }}" class="btn btn-secondary">
                    Back to Selected Game
                </a>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">
                        Edit game {{ $game->name }} ({{ $game->id }})
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-secondary">
                        Fields marked with * are required.
                    </p>
                    <form action="{{ route('games.update', $game->id) }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-12">
                            <label for="name" class="form-label">
                                * Game name
                            </label>
                            <input value="{{ $game->name }}" type="text" name="name" id="name" class="form-control" required pattern="\S(.*\S)?">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">
                                Game description
                            </label>
                            <textarea name="description" id="description" class="form-control">{{ $game->description }}</textarea>
                        </div>

                        {{-- - 2 possibilities: don't show the input if original game has no logo or check presence in update route --}}
                        {{-- - The first has the problem of not allowing to set an image if not set during creation, I'll try the second --}}
                        {{-- @if ($game->logo)
                            <div class="col-12">
                                <label for="logo" class="form-label">
                                    Game logo
                                </label>
                                <input type="file" name="logo" id="logo" class="form-control">
                            </div>
                        @endif --}}
                        <div class="col-12">
                            <label for="logo" class="form-label">
                                Game logo
                            </label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>

                        <div class="col-12">
                            <input type="submit" value="Edit game" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection