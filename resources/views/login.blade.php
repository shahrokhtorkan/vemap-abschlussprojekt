@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        {{--<div class="title text-center text-dark display-1 mb-5">
            <h1>Einloggen</h1>
        </div>--}}
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-6 mb-5">
                    <div class="card">
                        <div class="card-header text-dark card-top"><i class="fas fa-sign-in-alt mr-1"></i>{{ __('Einloggen') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('authenticate') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right text-dark">{{ __('E-Mail-Addresse') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" placeholder="Ihre Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Passwort') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" placeholder="Ihr Passwort" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label text-dark" for="remember">
                                                {{ __('Meine Daten speichern') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Einloggen') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                                {{ __('Passwort vergessen?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
