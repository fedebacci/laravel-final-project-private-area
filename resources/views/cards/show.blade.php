@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Card: ' . $card->name)

@section('content')
    <section id="cards-show-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Card: ' . $card->name) }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('cards.index') }}" class="btn btn-secondary">
                    Back to Cards List
                </a>
                <a href="{{ route('cards.edit', $card) }}" class="btn btn-warning">
                    Edit Card
                </a>
                <x-delete-resource-button-modal>
                    <x-slot:button_class></x-slot>
                    <x-slot:resource_id>{{ $card->id }}</x-slot>
                    <x-slot:resource_name>{{ $card->name }}</x-slot>
                    <x-slot:resource_type>card</x-slot>
                </x-delete-resource-button-modal>                 
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
                    

                    


                    @if ($card->decks) 
                        @php
                            $card->decks = $card->decks->sortBy('id');
                        @endphp
                        <p class="mb-0">
                            Assigned decks: {{ count($card->decks) }}
                        </p>
                        @if (!$card->decks->isEmpty())
                            <ul>
                                @foreach ($card->decks as $deck)
                                    <li>{{$deck->name}} ({{$deck->game->name}})</li>
                                @endforeach
                            </ul>
                        @endif
                    @endif


                </div>
            </div>

        </div>
    </section>
@endsection