@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="title text-center text-dark display-1 mb-5">
        <h1>Leistungen</h1>
    </div>
</div>
<div id="app">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-dark"><i class="fas fa-toolbox"></i>{{ __(' Leistungen') }}</div>
                    <div class="card-body">
                        <div class="card-body">
                            <p>Physiotherapie<P>
                            <p>Sport-Physiotherapie</p>
                            <p>Fußreflexzonenmassage</p>
                            <p>Lymphdrainage</p>
                            <p>Kinesio-Taping</p>
                            <p>Osteopathie</p>
                            <p>Fasziendistorsionsmodell (FDM)</p>
                            <p>Craniosacral-Therapie</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
