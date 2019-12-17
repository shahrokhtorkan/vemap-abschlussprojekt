<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ config('app.name', 'Patient') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon">
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
    {{--<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>--}}
    <!-- Font Awesome -->
    <script src="{{ asset('js/fontawesome.js') }}"></script>

</head>
<body>
<!-- Full Page Intro -->
{{--<div class="view" style="background-image:url({{url('images/bg.jpg')}}); background-repeat: no-repeat; background-size: cover; -o-background-size: cover; -moz-background-size: cover; -webkit-background-size: cover; background-position: center center; background-attachment: fixed;">--}}

    <div id="app">
        <nav class="navbar navbar-expand-md bg-light navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse mt-3" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav">
                        @if (App\User::hasPermission('login'))
                            <li class="nav-item mr-2 mb-2">
                                <a class="btn btn-primary btn-block" href="{{ route('backend') }}">Home</a>
                            </li>
                        @endif
                        @if (App\User::hasPermission('admin-patient'))
                            <li class="nav-item mr-2 mb-2">
                                <a class="btn btn-primary btn-block" href="{{ route('patients') }}">Patients</a>
                            </li>
                        @endif
                        @if (App\User::hasPermission('admin-document'))
                            <li class="nav-item mr-2 mb-2">
                                <a class="btn btn-primary btn-block" href="{{ route('documents') }}">Dokument</a>
                            </li>
                        @endif
                        @if (App\User::hasPermission('admin-calendar'))
                            <li class="nav-item mr-2 mb-2">
                                <a class="btn btn-primary btn-block" href="{{ route('appointments') }}">Termine</a>
                            </li>
                        @endif
                        @if (App\User::hasPermission('admin-patient'))
                            <li class="nav-item mr-2 mb-2">
                                <a class="btn btn-primary btn-block" href="{{ route('inquiries') }}">{{ __('Anfragen') }}</a>
                            </li>
                        @endif
                        @auth
                            {{-- No frontend items for logged-in users --}}
                        @else
                            <div class="nav-item dropdown mr-2 mb-2">
                                <a id="navbarDropdown" class="dropdown-toggle btn btn-primary btn-block" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-link mr-1"></i>{{ __('Seiten') }}
                                </a>
                                <span class="caret"></span>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('about') }}"><i class="fas fa-user-md mr-1"></i>{{ __('Über uns') }}</a>
                                    <a class="dropdown-item" href="{{ route('services') }}"><i class="fas fa-toolbox mr-1"></i>{{ __('Leistungen') }}</a>
                                    <a class="dropdown-item" href="{{ route('contact') }}"><i class="fas fa-envelope mr-1"></i>{{ __('Kontakt') }}</a>
                                    <a class="dropdown-item" href="{{ route('imprint') }}"><i class="fas fa-clinic-medical mr-1"></i>{{ __('Impressum') }}</a>
                                </div>
                            </div>
                        @endauth
                        {{--@can('view-own-data')
                        <li class="nav-item mr-2 mb-2">
                            <a class="btn btn-primary btn-block" href="{{ route('backend') }}"><i class="fas fa-home mr-1"></i>{{ __('Home') }}</a>
                        </li>
                        @endcan
                        @can('admin-patient')
                        <li class="nav-item mr-2 mb-2">
                            <a class="btn btn-primary btn-block" href="{{ route('patients') }}"><i class="fas fa-user mr-1"></i>{{ __('Patients') }}</a>
                        </li>
                        @endcan
                        @can('admin-document')
                            <li class="nav-item mr-2 mb-2">
                                <a class="btn btn-primary btn-block" href="{{ route('documents') }}"><i class="fas fa-file-alt mr-1"></i>{{ __('Document') }}</a>
                            </li>
                        @endcan
                        @can('admin-calendar')
                            <li class="nav-item mr-2 mb-2">
                                <a class="btn btn-primary btn-block" href="{{ route('appointments') }}"><i class="fas fa-calendar-alt mr-1"></i>{{ __('Termine') }}</a>
                            </li>
                        @endcan--}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mr-2 mb-2">
                                <a class="btn btn-primary btn-block" href="{{ route('login') }}">{{ __('Einloggen') }}</a>
                            </li>
                        @if (Route::has('register'))
                            <li class="nav-item mr-2 mb-2">
                                <a class="btn btn-primary btn-block" href="{{ route('register') }}">{{ __('Registrieren') }}</a>
                            </li>
                        @endif
                        @else
                            <div class="nav-item dropdown mr-2 mb-2">
                                <a id="navbarDropdown" class="dropdown-toggle btn btn-primary btn-block" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user mr-1"></i>{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt mr-1"></i>{{ __('Ausloggen') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
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
<div class="footer fixed-bottom pt-3 pb-0">
    <div>
        {{--<ul class="list-inline text-center mb-3">
            <li class="list-inline-item"><a class="text-dark" href="{{ url('about') }}">{{ __('Über uns') }}</a></li>|
            <li class="list-inline-item"><a class="text-dark" href="{{ route('services') }}">{{ __('Leistungen') }}</a></li>|
            <li class="list-inline-item"><a class="text-dark" href="{{ route('contact') }}">{{ __('Kontakt') }}</a></li>|
            <li class="list-inline-item"><a class="text-dark" href="{{ route('imprint') }}">{{ __('Impressum') }}</a></li>
        </ul>--}}
        {{--<h3 class="text-center">FOLGE UNS</h3>
        <ul class="social-icons list-inline text-center mb-3">
            <li><a target="_blank" href="https://www.facebook.com"><i class="fab fa-facebook-square mr-3"></i></a></li>
            <li><a target="_blank" href="https://github.com/shahrokhtorkan/vemap-abschlussprojekt.git"><i class="fab fa-github mr-3"></i></a></li>
            <li><a target="_blank" href="https://twitter.com"><i class="fab fa-twitter mr-3"></i></a></li>
            <li><a target="_blank" href="https://www.linkedin.com"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>--}}
        <p class="text-center text-light">Copyright © vemap academy 2019 | Application Services powered by <a class="text-light" target="_blank" href="https://www.vemapacademy.at">vemapacademy.at</a></p>
    </div>
</div>
</body>
</html>
