@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        <div class="title text-center text-dark display-1 mb-5">
            <h1>Übersicht - Patienten</h1>
        </div>

        @if (count($patients) > 0)
            @foreach($patients as $patient)
                {{ $patient -> svnr }}
                {{ $patient -> lastname }} {{ $patient -> firstname }}
                {{ $patient -> address }}
                {{ $patient -> plz }}
                {{ $patient -> city }}
                {{ $patient -> country }}
            @endforeach
        @endif
    </div>
</div>
@endsection
