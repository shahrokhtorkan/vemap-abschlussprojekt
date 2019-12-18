@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-4">
    <div class="content">
        <div id="app">
            <div class="container mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-calendar-alt mr-1"></i>{{ __('Termine') }}</div>
                            <div class="card-body">

                                @if(!empty($availableSlots))
                                    <h1>Verfügbare Termine</h1>

                                    @include('backend.includes.appointments-table', ['slots' => $availableSlots])

                                @else
                                    <p>Keine Termine.</p>
                                @endif

                                @if(!empty($confirmedSlots))
                                    <h1>Bestätigte Termine</h1>

                                    @include('backend.includes.appointments-table', ['slots' => $confirmedSlots])

                                @else
                                    <p>Keine Termine.</p>
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
