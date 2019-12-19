@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-4">
    <div class="content">
        <div id="app">
            <div class="container mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-4">
                        <div class="card mb-5">
                            <div class="card-header text-dark card-top"><i class="fas fa-calendar-alt mr-1"></i>{{ __('Termine') }}</div>
                            <div class="card-body">

                                <h4>Verfügbare Termine:</h4>
                                @if(!empty($availableSlots))
                                    @include('backend.includes.admin-appointments-table', ['slots' => $availableSlots, 'showDeleteAction'=>true])
                                @else
                                    <p>Keine Verfügbarkeiten vorhanden.</p>
                                @endif

                                <h4 class="mt-5">Bestätigte Termine:</h4>
                                @if(!empty($confirmedSlots))
                                    @include('backend.includes.admin-appointments-table', ['slots' => $confirmedSlots])
                                @else
                                    <p>Keine Terminreservierungen vorhanden.</p>
                                @endif

                                <h4 class="mt-5">Neue Verfügbarkeiten:</h4>
                                <form class="form-inline" method="post" action="/appointments/create">
                                    @csrf
                                    <label for="day_date">Tag:</label>
                                    <select class="form-control ml-1 mr-1" name="day_date">
                                        @foreach(App\Appointment::getNextWorkingDays(14) as $date)
                                            <option @if($loop->first)selected="selected"@endif name="{{$date}}">{{ $date->isoFormat('LLLL') }}</option>
                                        @endforeach
                                    </select>
                                    <label for="start">Von:</label>
                                    <input class="form-control ml-1 mr-1 col-1" type="text" name="start" value="10:00">
                                    <label for="end">Bis:</label>
                                    <input class="form-control ml-1 mr-2 col-1" type="text" name="end" value="16:00" style="width:60px">
                                    <button class="btn btn-primary" type="submit">Erzeugen</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
