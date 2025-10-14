@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Dashboard')

@section('content')
<section id="dashboard-content">
    <div class="container">
        {{-- <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2> --}}
        <div class="row g-3">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header">{{ __('User Dashboard') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <p>
                            {{ __('You are logged in as') }} {{ Auth::user()->name }}
                        </p>
    
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                            Manage Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card h-100">
                    <div class="card-header">
                        Manage games
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <p>
                            Here you can manage games (Poker, Pokèmon, Magic, Yu-Gi-Oh! ecc..)
                        </p>
                        <a href="{{ route('games.index') }}" class="btn btn-primary">
                            Manage Games
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card h-100">
                    <div class="card-header">
                        Manage Cards
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <p>
                            Here you can manage your cards
                        </p>
                        <a href="{{ route('cards.index') }}" class="btn btn-primary">
                            Manage Cards
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card h-100">
                    <div class="card-header">
                        Manage Decks
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <p>
                            Here you can manage your decks
                        </p>
                        <a href="{{ route('decks.index') }}" class="btn btn-primary">
                            Manage Decks
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
