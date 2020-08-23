<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">      
</head>

<body>
    <div class="content-welcome wrapper style3">
        <header class="inner"> 
            <div class="title text-center">
                    <h1>@yield('code', __('Oh no'))</h1>
                    <p>@yield('message')</p>
                    <a href="{{ url()->previous() }}">
                        <button class="button alt mt-3 ">
                            {{ __('Go Back') }}
                        </button>
                    </a>
            </div>
        </header>
    </div>
        
</body>
</html>
