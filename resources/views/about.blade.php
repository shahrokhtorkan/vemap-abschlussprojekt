@extends('layouts.app')

@section('content')
{{--<div class="flex-center position-ref full-height mt-5">
    <div class="title text-center text-dark display-1 mb-5">
        <h1>Über uns</h1>
    </div>
</div>--}}
<div id="app">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-dark"><i class="fas fa-user-md mr-1"></i>{{ __('Über uns') }}</div>
                    <div class="card-body">
                        <div class="card-body">
                            <P>Anna Fink</P>
                            <p>Als Physiotherapeutin ist mir die ganzheitliche Arbeit mit dem Patienten wichtig. Die Osteopathie biete ich ebenfalls an - sie ergänzt die Behandlung optimal. Barbara und ich arbeiten schon lange zusammen und wir freuen uns, auch Sie in unserer Praxis begrüßen zu dürfen.</P>
                            <p>Barbara Berg</P>
                            <P>Ich kenne Anna schon seit der Schulzeit und wir haben Teile unserer Ausbildungen gemeinsam gemacht. Gemeinsam möchten wir unseren Patientinnen und Patienten stets das Allerbeste bieten und das gelingt uns jeden tag aufs Neue.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
