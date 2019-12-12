@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        {{--<div class="title text-center text-dark display-1 mb-5">
            <h1>Instrumententafel</h1>
        </div>--}}
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8 mb-5">
                    <div class="card">
                        <div class="card-header text-dark card-top"><i class="fas fa-user-tie mr-1"></i>Instrumententafel</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h2 class="mb-4">Willkommen {{ auth()->user()->name }}</h2>
                                <h5>Sie haben neue Kontaktanfragen</h5>
                                @if(!empty($inquiries))
                                    <table class="table table-bordered table-hover table-sm table-responsive-sm mb-5">
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>email</th>
                                        </tr>
                                        @foreach($inquiries as $q)
                                            <tr>
                                                <td>{{ $q->id }} </td>
                                                <td>{{ $q->name }} </td>
                                                <td>{{ $q->email }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p>Keine Kontakt vorhanden.</p>
                                @endif

                                    <h5>Meine Stammdaten</h5>


                                    <h5>Meine Termine</h5>


                                    <h5>Termin buchen</h5>
                                    {{--<form method="post" action="/slot/reserve">--}}
                                        @csrf
                                        {{--<select>--}}

                                        {{--</select>--}}
                                        <p>Buchungen sind erst nach Bestätigung durch den Behandler verbindlich.</p>
                                        <button type="submit" class="btn btn-primary">Buchen</button>
                                    {{--</form>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
