@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Dashboard')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
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
                        Edit Profile
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
                    <a href="#" class="btn btn-primary">
                        Manage
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card h-100">
                <div class="card-header">
                    Manage types of cards
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <p>
                        Here you can manage types of cards (poker, magic, yugioh ecc..)
                    </p>
                    <a href="#" class="btn btn-primary">
                        Manage
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
                    <a href="#" class="btn btn-primary">
                        Manage
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
