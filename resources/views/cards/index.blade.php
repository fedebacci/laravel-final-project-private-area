@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Cards List')

@section('content')
    <section id="cards-index-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Cards List') }}
            </h2> --}}

            <div class="d-flex gap-1 mb-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    Back to the dashboard
                </a>
                <a href="{{ route('cards.create') }}" class="btn btn-primary">
                    Create new Card
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


            <form action="{{ route('cards.index') }}" method="GET" class="row g-3">
                @csrf
                <div class="col-12">
                    <div class="input-group mb-3">
                        <input type="submit" value="Search" class="btn btn-outline-success">
                        <input value="{{ $searchValue }}" name="search" type="text" class="form-control" placeholder="Search by name">
                    </div>
                </div>
            </form>            

            @if ($cards->isEmpty())
                <div class="alert alert-warning">
                    No cards found.
                </div>
            @else
                {{ $cards->links() }}
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                Id
                            </th>
                            <th scope="col">
                                Image
                            </th>
                            <th scope="col">
                                Name
                            </th>
                            <th scope="col">
                                Description
                            </th>
                            <th scope="col">
                                Game
                            </th>
                            <th scope="col">
                                Associated decks
                            </th>
                            <th scope="col">
                                Price
                            </th>
                            <th scope="col">
                                Edition
                            </th>
                            <th scope="col">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($cards as $card)
                            <tr>
                                <th scope="row">
                                    {{ $card->id }}
                                </th>
                                <td>
                                    @if ($card->image)
                                        <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->name }} Image" class="card-image">
                                    @else
                                        No image Available
                                    @endif
                                </td>
                                <td>
                                    {{ $card->name }}
                                </td>
                                <td>
                                    @if ($card->description)
                                        @if (strlen($card->description) <= 100)                                            
                                            {{ $card->description }}
                                        @else                                            
                                            {{ substr($card->description, 0, 100) . '...' }}
                                        @endif
                                    @else
                                        No Description
                                    @endif
                                </td>
                                <td>
                                    @if ($card->game)
                                        Game: 
                                        <a href="{{ route('games.show', $card->game->id) }}" class="text-decoration-none">
                                            {{ $card->game->name }}
                                        </a>
                                    @else
                                        No game assigned (error)
                                    @endif
                                </td>
                                <td>
                                    @if ($card->decks)
                                        Decks: {{ count($card->decks) }}
                                    @else
                                        No decks assigned
                                    @endif
                                </td>
                                <td>
                                    @if ($card->price)
                                        € {{ $card->price }}
                                    @else
                                        No price Available
                                    @endif
                                </td>
                                <td>
                                    @if ($card->edition)
                                        {{ $card->edition }}
                                    @else
                                        No edition Available
                                    @endif
                                </td>
                                <td>
                                    {{-- <div class="d-flex flex-nowrap gap-1"> --}}
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('cards.show', $card) }}" class="btn btn-primary btn-sm">
                                            View
                                        </a>
                                        <a href="{{ route('cards.edit', $card) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <x-delete-resource-button-modal>
                                            <x-slot:button_class>btn-sm</x-slot>
                                            <x-slot:resource_id>{{ $card->id }}</x-slot>
                                            <x-slot:resource_name>{{ $card->name }}</x-slot>
                                            <x-slot:resource_type>card</x-slot>
                                        </x-delete-resource-button-modal>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection