@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        {{--<div class="title text-center text-dark display-1 mb-5">
            <h1>Sample Title</h1>
        </div>--}}
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-dark card-top">{{ __('Sample Title') }}</div>
                            <div class="card-body">


                                @if($reservedSlots)
                                    <h1>Meine Terminreservierungen</h1>

                                    @if($availableSlots)
                                        <h2>Available Termine verfügbar</h2>
                                    @endif
                                @else
                                    <p>Keine Terminreservierungen.</p>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
