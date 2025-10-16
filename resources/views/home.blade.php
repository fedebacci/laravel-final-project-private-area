@extends('layouts.app')

@section('title', config('app.name', 'CardsMasters') . ' - Home')

@section('content')

<section id="home-content">
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <h2 class="display-6 fw-bold">
                Welcome to my final PHP specialization project!
            </h2>
    
            <p class="fs-4">
                Register as a new user, have fun with the resources that I have prepared for you, edit them and create new ones!
            </p>
        </div>
    </div>
    
    <div class="content">
        <div class="container">
            <p>
                You can also find the 
                <a href="#">frontoffice project</a> 
                on my
                <a href="https://github.com/fedebacci?tab=repositories" target="_blank">GitHub profile</a>.
            </p>
        </div>
    </div>
</section>
@endsection