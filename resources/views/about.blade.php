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
                                <P>Anna Fink</P>
                                <p>Als Physiotherapeutin ist mir die ganzheitliche Arbeit mit dem Patienten wichtig. Die Osteopathie biete ich ebenfalls an - sie ergänzt die Behandlung optimal. Barbara und ich arbeiten schon lange zusammen und wir freuen uns, auch Sie in unserer Praxis begrüßen zu dürfen.</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
