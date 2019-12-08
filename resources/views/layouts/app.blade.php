<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{--<script src="{{ asset('js/jquery.min.js') }}" defer></script>--}}
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ config('app.name', 'Patient') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- app.js -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Text Animate -->
    <script src="{{ asset('js/textanimate.js') }}"></script>
    <!-- jQuery Effects - Sliding -->
    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <!-- Font Awesome -->
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <!-- Data Tables -->
    {{--<link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">--}}

</head>
<body>
<!-- Full Page Intro -->
<div class="view" style="background-image:url({{url('images/bg.jpg')}}); background-repeat: no-repeat; background-size: cover; background-position: center center;">

    <div id="app">
        <nav class="navbar navbar-expand-md bg-light navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse mt-3" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        <li class="nav-item mr-2 mb-2">
                            <a class="nav-link text-dark btn btn-block btn-outline-info" href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>
                        {{--<li class="nav-item mr-2 mb-2">
                            <a class="nav-link text-dark btn btn-block btn-outline-info" href="{{ route('contact') }}">{{ __('Kontakt') }}</a>
                        </li>--}}
                        <li class="nav-item mr-2 mb-2">
                            <a class="nav-link text-dark btn btn-block btn-outline-info" href="{{ route('backend') }}">{{ __('Backend') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mr-2 mb-2">
                                <a class="nav-link text-dark btn btn-block btn-outline-info" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @if (Route::has('register'))
                            <li class="nav-item mr-2 mb-2">
                                <a class="nav-link text-dark btn btn-block btn-outline-info" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-block btn-outline-info" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
<div class="footer fixed-bottom pt-3 pb-3">
    <div>
        <ul class="list-inline text-center mb-3">
            <li class="list-inline-item"><a class="text-dark" href="{{ url('about') }}">{{ __('Über uns') }}</a></li>|
            <li class="list-inline-item"><a class="text-dark" href="{{ route('services') }}">{{ __('Leistungen') }}</a></li>|
            <li class="list-inline-item"><a class="text-dark" href="{{ route('contact') }}">{{ __('Kontakt') }}</a></li>|
            <li class="list-inline-item"><a class="text-dark" href="{{ route('imprint') }}">{{ __('Impressum') }}</a></li>
        </ul>
        <h3 class="text-center">FOLGE UNS</h3>
        <ul class="social-icons list-inline text-center mb-3">
            <li><a target="_blank" href="https://www.facebook.com"><i class="fab fa-facebook-square mr-3"></i></a></li>
            <li><a target="_blank" href="https://github.com/shahrokhtorkan/vemap-abschlussprojekt.git"><i class="fab fa-github mr-3"></i></a></li>
            <li><a target="_blank" href="https://twitter.com"><i class="fab fa-twitter mr-3"></i></a></li>
            <li><a target="_blank" href="https://www.linkedin.com"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
        <h6 class="text-center">Copyright © vemap academy 2019 | Application Services powered by <a target="_blank" href="https://www.vemapacademy.at">vemapacademy.at</a></h6>
    </div>
</div>
</body>
</html>
