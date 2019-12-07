@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="title text-center text-dark display-1 mb-5">
        <h1>Impressum</h1>
    </div>
</div>
<div id="app">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-dark"><i class="fas fa-clinic-medical"></i>{{ __(' Impressum') }}</div>
                    <div class="card-body">
                        <div class="card-body">
                            <h2>Patient</h2>
                            <p>Unsere Sekretariatsöffnungszeiten sind:</P>
                            <P><i class="fas fa-calendar-alt"></i> Montag - Freitag  8:00 - 11:00</P>
                            <P><i class="fas fa-phone"></i> +43 / 123 123 123 123</P>
                            <P><i class="fas fa-envelope"></i> office[at]example.com</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
