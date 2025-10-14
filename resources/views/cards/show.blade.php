@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Card: ' . $card->name)

@section('content')
    <section id="cards-show-content">
        <div class="container">
            <h2 class="fs-4 text-secondary my-4">
                {{ __('Card: ' . $card->name) }}
            </h2>

            <div class="d-flex">
                <a href="{{ route('cards.index') }}" class="btn btn-secondary me-2 mb-3">
                    Back to Cards List
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ $card->name }}
                </div>
                <div class="card-body">
                    @if ($card->image)
                        {{-- <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->name }} Image" class="mb-3"> --}}
                        {{-- - Temporary for testing without images management --}}
                        <img src="{{ $card->image }}" alt="{{ $card->name }} Image" class="card-image mb-3">
                    @endif
                    <p>
                        {{ $card->description ?? 'No Description Available.' }}
                    </p>
                    <p>
                        {{ $card->price ? '€ ' . $card->price : 'No price Available.' }}
                    </p>
                    <p>
                        {{ $card->edition ?? 'No edition Available.' }}
                    </p>


                    @if ($card->game)
                        <p>
                            Game: {{ $card->game->name }}
                        </p>
                    @else
                        <p class="m-0 alert alert-danger">
                            No game assigned (error)
                        </p>
                    @endif


                </div>
            </div>

        </div>
    </section>
@endsection