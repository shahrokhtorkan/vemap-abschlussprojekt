@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        {{--<div class="title text-center text-dark display-1 mb-5">
            <h1>Meine Termine</h1>
        </div>--}}
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 mb-5">
                        <div class="card">
                            <div class="card-header text-dark card-top">{{ __('Meine Termine') }}</div>
                            <div class="card-body">

                                {{-- Slots where('status' is 'reserved') --}}
                                @if($reservedSlots)
                                    <h1>Meine Terminreservierungen</h1>
                                @else
                                    <p>Es gibt keine Terminreservierungen.</p>
                                @endif

                                {{-- Slots where('status' is 'available') --}}
                                    @if($availableSlots)
                                        <h2>Du hast {{$availableSlots->count()}} freie Termine</h2>
                                    @endif

                                {{-- Slots where('status' is 'confirmed') --}}
                                    @if($confirmedSlots)
                                        <h2>Du hast {{$confirmedSlots->count()}} bestätigte Termine</h2>
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
