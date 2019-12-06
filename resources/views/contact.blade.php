@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="title text-center text-dark display-1 mb-5">
        <h1>Contact Us</h1>
    </div>
</div>

<div id="app">
    <div class="flex-center position-ref full-height mb-5">
        <div class="col-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Contact us</h2>
                </div>
                <div class="card-body">
                    <!--
                        Our component:
                    -->
                    <contact-form></contact-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
