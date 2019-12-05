@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="title text-center text-light display-1 mb-5">
        Portal
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-light">Dashboard</div>

                <div class="card-body mb-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-light">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
