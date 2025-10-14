@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Decks List')

@section('content')
    <section id="decks-index-content">
        <div class="container">
            {{-- <h2 class="fs-4 text-secondary my-4">
                {{ __('Decks List') }}
            </h2> --}}

            @if ($decks->isEmpty())
                <div class="alert alert-warning">
                    No decks found.
                </div>
            @else
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                Id
                            </th>
                            <th scope="col">
                                Name
                            </th>
                            <th scope="col">
                                Description
                            </th>
                            <th scope="col">
                                Price
                            </th>
                            <th scope="col">
                                Game
                            </th>
                            <th scope="col">
                                Contained cards
                            </th>
                            <th scope="col">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($decks as $deck)
                            <tr>
                                <th scope="row">
                                    {{ $deck->id }}
                                </th>
                                <td>
                                    {{ $deck->name }}
                                </td>
                                <td>
                                    @if ($deck->description)
                                        {{ $deck->description }}
                                        {{-- {{ Str::limit($deck->description, 50) }} --}}
                                    @else
                                        No Description
                                    @endif
                                </td>
                                <td>
                                    @if ($deck->price)
                                        € {{ $deck->price }}
                                    @else
                                        @php
                                            $total_price = 0;    
                                        @endphp
                                        @foreach ($deck->cards as $card)
                                            @php
                                                $total_price = $total_price + $card->price;    
                                            @endphp
                                        @endforeach
                                        {{ $total_price != 0 ? 'Calc: € ' . $total_price : 'No price Available' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $deck->game->name }}
                                </td>
                                <td>
                                    @if ($deck->cards) 
                                        {{ count($deck->cards) }}
                                    @endif
                                </td>
                                <td>
                                    {{-- Actions here --}}
                                    <a href="{{ route('decks.show', $deck) }}" class="btn btn-primary btn-sm">
                                        View
                                    </a>
                                    {{-- <a href="{{ route('decks.edit', $deck) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a> --}}
                                    {{-- <form action="{{ route('decks.destroy', $deck) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this game?')">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection