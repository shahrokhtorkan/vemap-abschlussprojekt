@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        {{--<div class="title text-center text-dark display-1 mb-5">
            <h1>Kontakt</h1>
        </div>--}}
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-7 mb-5">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-envelope mr-1"></i>{{ __('Kontakt') }}</div>
                            <div class="card-body">
                                <div class="card-body">
                                    <p><img src="../images/contact.png" class="img-fluid rounded mx-auto d-block" alt="Responsive image"></p>
                                    <contact-form></contact-form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
