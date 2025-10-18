@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Create Game')

@section('content')
    <section id="games-create-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Create Game') }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Back to the dashboard
                </a>
                <a href="{{ route('games.index') }}" class="btn btn-secondary">
                    Back to Games List
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
                        Create a new game
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-secondary">
                        Fields marked with * are required.
                    </p>
                    <form action="{{ route('games.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label for="name" class="form-label">
                                * Game name
                            </label>
                            <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control" required pattern="\S(.*\S)?">
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">
                                Game description
                            </label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label for="logo" class="form-label">
                                Game logo
                            </label>
                            {{-- # Not possible for security reasons --}}
                            {{-- <input value="{{ old('logo') }}" type="file" name="logo" id="logo" class="form-control"> --}}
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Create game" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection