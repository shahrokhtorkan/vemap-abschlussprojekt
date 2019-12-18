@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height mt-4">
        <div class="content">
            <div class="container mb-4">
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-5">
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

                                    <h4>Meine Termine</h4>
                                    {{--@include('backend.includes.patient-appointments-table', ['appointments' => $mySlots])--}}

                                    <h4>Termin buchen</h4>
                                    {{--<form method="post" action="/appointments/reserve">
                                        @csrf
                                        <select name="slot_id">
                                            @forelse($availableSlots as $slot)
                                                <option value="{{ $slot->id }}">{{ $slot->user->name }}: {{$slot->start->format('d.m. H:i')}}</option>
                                            @empty
                                                <option value="">(Leider sind keine Termine verfuegbar)</option>
                                            @endforelse
                                        </select>
                                        <p>Buchungen sind erst nach Bestätigung durch den Behandler verbindlich.</p>
                                        <button type="submit">Buchen</button>
                                    </form>--}}

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
