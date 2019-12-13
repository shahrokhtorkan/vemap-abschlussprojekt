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
                            <div class="card-header text-dark card-top"><i class="fas fa-user-tie mr-1"></i>{{ auth()->user()->name }}'s Profil</div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <h3 class="mb-4">Willkommen {{ auth()->user()->name }}</h3>
                                <h5>Sie haben neue Kontaktanfragen</h5>
                                @if(!empty($inquiries))
                                    <table class="table table-bordered table-hover table-sm table-responsive-sm mb-5">
                                        <tr>
                                            <th>Anfragenummer</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telefon</th>
                                            <th>hergestellt in</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach($inquiries as $q)
                                            <tr>
                                                <td>{{ $q->id }} </td>
                                                <td>{{ $q->name }} </td>
                                                <td>{{ $q->email }}</td>
                                                <td>{{$q->phone}}</td>
                                                <td>{{$q->created_at}}</td>
                                                <td><form method="post"  action="{{ route('update',$q)}}">
                                                        @csrf
                                                        <input class="form-check-input" type="hidden" name="status" value="0" checked/>

                                                        {{--                                                <input type="text" name="status" value="{{ $q->status }}">--}}
                                                        <input type="submit"></form></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p>Keine Kontakt vorhanden.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
