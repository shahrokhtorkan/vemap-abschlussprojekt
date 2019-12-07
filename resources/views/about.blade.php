@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="title text-center text-dark display-1 mb-5">
        <h1>Über uns</h1>
    </div>
</div>

<div id="app">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-dark">{{ __('Über uns') }}</div>
                    <div class="card-body">
                        <div class="card-body">
                            <about-us></about-us>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
