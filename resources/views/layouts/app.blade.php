<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name', 'CardsMasters'))
    </title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">

        @include('partials.header')

        <main class="">

            <section id="view-title" class="py-5">
                <div class="container">
                    <h1 class="text-secondary text-center">
                        @yield('title', config('app.name', 'CardsMasters'))
                    </h1>
                </div>
            </section>

            @yield('content')
        </main>
    </div>
</body>

</html>
