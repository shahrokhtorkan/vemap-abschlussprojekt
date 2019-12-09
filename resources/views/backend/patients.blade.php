@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        <div class="title text-center text-dark display-1 mb-5">
            <h1>Übersicht - Patienten</h1>
        </div>
        @if (count($patients) > 0)
        <table id="myTable" class="display table table-bordered table-hover">
            <thead>
            <tr>
                <th>SVNr</th>
                <th>Name</th>
                <th>Adresse</th>
                <th>PLZ</th>
                <th>Stadt</th>
                <th>Land</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($patients as $patient)
                <td>{{ $patient -> svnr }}</td>
                <td>{{ $patient -> lastname }} {{ $patient -> firstname }}</td>
                <td>{{ $patient -> address }}</td>
                <td>{{ $patient -> plz }}</td>
                <td>{{ $patient -> city }}</td>
                <td>{{ $patient -> country }}</td>
            </tr>
            </tbody>
            @endforeach
        </table>
        @endif
    </div>
</div>
@endsection
