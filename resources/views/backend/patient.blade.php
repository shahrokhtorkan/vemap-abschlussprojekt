@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        {{--<div class="title text-center text-dark display-1 mb-5">
            <h1>Neuen Patienten erstellen</h1>
        </div>--}}
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-dark"><i class="fas fa-user mr-1"></i>
                                @if($patient)
                                    Patient bearbeiten
                                @else
                                    Neuer Patient
                                    @endif
                                    &ndash;
                            </div>
                            <div class="card-body">
                                @if($patient)
                                    <h2 xmlns="http://www.w3.org/1999/html">{{$patient->firstname}} {{$patient->lastname}}</h2>
                                @endif

                                @if ($errors->any())
                                    <div class="validation-errors">
                                        <ul class="validation-error">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="post" action="{{ $patient ? route('patient', $patient->id) : route('newpatient') }}">
                                    @csrf
                                    <div class="inputform">
                                        @error('firstname')
                                        <p class="validation-error">{{ $message }}</p>
                                        @enderror
                                        @error('lastname')
                                        <p class="validation-error">{{ $message }}</p>
                                        @enderror
                                        <div class="row mb-2">
                                            <div class="col-2">
                                                <label>Vorname:</label>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control" type="text" name="firstname" value="{{$patient ? $patient->firstname : old('firstname')}}"
                                                       placeholder="Vorname">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-2">
                                                <label>Nachname:</label>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control" type="text" name="lastname" value="{{$patient ? $patient->lastname : old('lastname')}}"
                                                       placeholder="Nachname">
                                            </div>
                                        </div>
                                        @error('email')
                                        <p class="validation-error">{{ $message }}</p>
                                        @enderror
                                        <div class="row mb-2">
                                            <div class="col-2">
                                                <label>E-Mail:</label>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control" type="text" name="email" value="{{$patient ? $patient->email : old('email')}}" placeholder="E-Mail">
                                            </div>
                                        </div>
                                        @error('svnr')
                                        <p class="validation-error">{{ $message }}</p>
                                        @enderror
                                        <div class="row mb-2">
                                            <div class="col-2">
                                                <label>SVNr:</label>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control" type="text" name="svnr" value="{{$patient ? $patient->svnr : old('svnr')}}" placeholder="SVNr">
                                            </div>
                                        </div>
                                        @error('address')
                                        <p class="validation-error">{{ $message }}</p>
                                        @enderror
                                        @error('plz')
                                        <p class="validation-error">{{ $message }}</p>
                                        @enderror
                                        @error('city')
                                        <p class="validation-error">{{ $message }}</p>
                                        @enderror
                                        @error('country')
                                        <p class="validation-error">{{ $message }}</p>
                                        @enderror
                                        <div class="row mb-2">
                                            <div class="col-2">
                                                <label>Adresse:</label>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control" type="text" name="address" value="{{$patient ? $patient->address : old('address')}}"
                                                       placeholder="Adresse">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-2">
                                                <label>PLZ:</label>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control" type="text" name="plz" value="{{$patient ? $patient->plz : old('plz')}}" placeholder="PLZ">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-2">
                                                <label>City:</label>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control" type="text" name="city" value="{{$patient ? $patient->city : old('city')}}" placeholder="Stadt">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-2">
                                                <label>Country:</label>
                                            </div>
                                            <div class="col-10">
                                                <input class="form-control" type="text" name="country" value="{{$patient ? $patient->country: old('country')}}" placeholder="Land">
                                            </div>
                                        </div>
                                        <button class="btn btn-primary mr-1" type="submit">{{ $patient ? 'Anlegen' : 'Speichern' }}</button>
                                        <a href="{{ route('patients') }}" class="btn btn-primary">Alle Patienten anzeigen.</a>
                                    </div>
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