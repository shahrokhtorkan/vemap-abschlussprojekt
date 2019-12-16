@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        <p><img src="../images/logo.png" class="img-fluid rounded mx-auto d-block" alt="Responsive image"></p>
        <h2 class="text-center mt-5 mb-5">Nutzen Sie unser Anfrageformular <a href="{{ url('/contact') }}">hier</a> und schicken Sie uns eine Anfrage.</h2>
            <span>
                <h2 class="typewrite text-center" data-period="2000" data-type='[ "Ihr Praktischer Arzt mit Schwerpunkt Schmerztherapie.", "Haben Sie Fragen?", "Senden Sie uns Ihre Anfrage mit Hilfe unseres Kontaktformulars."]'>
                    <span class="wrap"></span>
                </h2>
            </span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    {{--content--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
