@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        {{--<div class="title text-center text-dark display-1 mb-5">
            <h1>Neue Dokument erstellen</h1>
        </div>--}}
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-user mr-1"></i>{{ __('Neue Dokument erstellen') }}</div>
                            <div class="card-body">
                                <p>Autor: {{ auth()->user()->name }}</p>
                                <form method="post" action="{{ route('document', $patientId) }}">
                                    @csrf
                                    <textarea class="form-control mb-2" rows="5" name="text" placeholder="Text"></textarea>
                                    <button class="btn btn-primary mt-0" type="submit">Speichern</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
