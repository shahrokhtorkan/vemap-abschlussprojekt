@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-7 mb-5">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-toolbox mr-1"></i>{{ __('Leistungen') }}</div>
                            <div class="card-body">
                                <p><img src="../images/services.png" class="img-fluid rounded mx-auto d-block" alt="Responsive image"></p>
                                <p>Therapie Aktiv Betreuungsprogramm</p>
                                <p>Marcoumar-Einstellung</p>
                                <p>Schmerztherapie</p>
                                <p>Nahtentfernung</p>
                                <p>Verbandwechsel</p>
                                {{--<p>Physiotherapie<P>
                                <p>Sport-Physiotherapie</p>
                                <p>Fußreflexzonenmassage</p>
                                <p>Lymphdrainage</p>
                                <p>Kinesio-Taping</p>
                                <p>Osteopathie</p>
                                <p>Fasziendistorsionsmodell (FDM)</p>
                                <p>Craniosacral-Therapie</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
