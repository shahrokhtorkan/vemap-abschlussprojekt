@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        {{--<div class="title text-center text-dark display-1 mb-5">
            Patient
        </div>--}}
        <p align="center"><img src="../images/logo.png"></p>
        <h2 class="text-center mt-5 line-1 anim-typewriter">Es ist KOSTENLOS für Sie,<a href="{{ url('/register') }}"> HAST DU LUST?</a></h2>
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
