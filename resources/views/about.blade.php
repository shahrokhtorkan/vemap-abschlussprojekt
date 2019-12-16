@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-7 mb-5">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-user-md mr-1"></i>{{ __('Über uns') }}</div>
                            <div class="card-body">
                                <p><img src="../images/about.png" class="img-fluid rounded mx-auto d-block" alt="Responsive image"></p>
                                <p>Richard Zauner<br>
                                   Praktischer Arzt, Schwerpunkt: Schmerztherapie</p>
                                <p>
                                    Herzlich Willkommen bei meiner Praxis für Allgemeinmedizin und ganzheitliche Schmerztherapie. Als Wahlarzt kann ich Ihnen genügend Zeit für das Arzt-Patienten-Gespräch, ausreichend Zeit für Untersuchungen und Befundbesprechungen, kurzfristige Termine, Hausbesuche und nahezu keine Wartezeiten bieten. Jeder Behandlung gehen eine umfangreiche Anamnese sowie ein ausführliches Beratungsgespräch voraus. Anschließend informiere ich Sie detailliert zu den einzelnen Therapieschritten.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
