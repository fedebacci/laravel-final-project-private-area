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
                            <input type="submit" value="Edit card" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection