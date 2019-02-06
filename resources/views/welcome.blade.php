<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper-gradient">
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses.index') }}">{{ __('Features') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses.index') }}">{{ __('Documentation') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses.index') }}">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses.index') }}">{{ __('Contact') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="headliner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="text-white">welcome to eruditei</h1>
                        <h3 class="text-white">more than a learning management system</h3>
                        <div class="row">
                            <div class="col-md-4 py-1">
                                <button class="btn btn-light btn-block" type="button">Learn More</button>
                            </div>
                            <div class="col-md-4 py-1">
                                <button class="btn btn-light btn-block" type="button">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h1>I'll put image here</h1>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>

