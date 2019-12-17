@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height mt-4">
        <div class="content">
            <div class="container mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-user-tie mr-1"></i>{{ auth()->user()->name }}-Profil</div>
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
                                    <p>Sie sind Assistant!</p>
                                @else
                                    {{--Meine Stammdaten--}}
                                    @include('backend.includes.patient-master-data')
                                    {{--Meine Dokumente--}}
                                    @include('backend.includes.patient-documents')

                                    <h2>Meine Termine</h2>
                                    {{--@include('backend.includes.patient-slot-table', ['appointments' => $mySlots])--}}

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
