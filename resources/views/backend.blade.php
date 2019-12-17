@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height mt-5">
        <div class="content">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-10 mb-5">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-user-tie mr-1"></i>{{ auth()->user()->name }}'s Profil</div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <h3 class="mb-4">Willkommen {{ auth()->user()->name }}</h3>

                                <p>
                                    Sie haben aufgrund Ihrer Rolle(n) {{ implode(", ", $user->getRoleNames()) }} die folgenden
                                    Berechtigungen: {{ implode(", ", $user->getPermissionNames()) }}
                                </p>

                                @if(App\User::hasRole('assistant'))
                                    Welcome, Assistant!
                                @else
                                    @if(App\User::hasPermission('view-own-data') && $patient)
                                        <p>Sie sind Patient.</p>

                                        <h2>Meine Stammdaten</h2>
                                        <table class="table table-bordered table-hover table-sm table-responsive-sm mb-3">
                                            <tr>
                                                <th>firstname</th>
                                                <th>lastname</th>
                                                <th>Email</th>
                                                <th>svnr</th>
                                                <th>address</th>
                                                <th>plz</th>
                                                <th>city</th>
                                                <th>country</th>
                                            </tr>
                                                <tr>
                                                    <td>{{ $patient->firstname }}</td>
                                                    <td>{{ $patient->lastname }}</td>
                                                    <td>{{ $patient->email }}</td>
                                                    <td>{{$patient->svnr}}</td>
                                                    <td>{{$patient->address}}</td>
                                                    <td>{{$patient->plz}}</td>
                                                    <td>{{$patient->city}}</td>
                                                    <td>{{$patient->country}}</td>
                                                </tr>
                                        </table>
                                    @else
                                        Sie sind kein Patient.
                                    @endif

                                    @if(App\User::hasPermission('view-own-data'))

                                        <h2>Meine Dokumente</h2>
                                        <table class="table table-bordered table-hover table-sm table-responsive-sm mb-3">
                                            <tr>
                                                <th>Text</th>
                                                <th>Pdf</th>
                                                <th>Erstellt in</th>
                                            </tr>

                                            @foreach($documents as $document)
                                                <tr>
                                                    <td>{{ $document->text }}</td>
                                                    <td>{{ $document->pdf }}</td>
                                                    <td>{{ $document->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @else
                                        Sie haben kein Dokument.
                                    @endif

                                    <h2>Meine Termine</h2>

                                    <h2>Termin buchen</h2>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
