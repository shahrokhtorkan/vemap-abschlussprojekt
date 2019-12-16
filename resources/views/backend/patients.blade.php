@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height mt-4">
        <div class="content">
            <div id="app">
                <div class="container mb-5">
                    <div class="row justify-content-center">
                        <div class="col-md-12 mb-5">
                            <div class="card">
                                <div class="card-header text-dark card-top"><i class="fas fa-user mr-1"></i>{{ __('Patientenübersicht') }}</div>
                                <div class="card-body">
                                    <div class="row mb-5">
                                        <div class="new-patient"><a href="{{ route('newpatient') }}" class="btn btn-primary">Neuer Patient</a></div>
                                        <div class="search">
                                            <form method="get" action="{{ route('patients') }}">
                                                @csrf
                                                <div class="input-group mb-4">
                                                    <input type="text" class="form-control mr-1" name="query" placeholder="Name oder SVNr" value="{{ request()->get('query') }}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @if (count($patients)>0)
                                        <table class="table table-sm table-bordered table-hover table-responsive-sm">
                                            <tr>
                                                @if( $orderBy == 'lastname')
                                                    <th>
                                                        <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'lastname', 'orderDirection' => $inverseOrderDirection]) }}">Name {!! $orderDirectionIndicator !!}</a>
                                                    </th>
                                                @else
                                                    <th>
                                                        <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'lastname', 'orderDirection' => $orderDirection]) }}">Name</a>
                                                    </th>
                                                @endif
                                                @if( $orderBy == 'svnr')
                                                    <th>
                                                        <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'svnr', 'orderDirection' => $inverseOrderDirection]) }}">SVNr {!! $orderDirectionIndicator !!}</a>
                                                    </th>
                                                @else
                                                    <th>
                                                        <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'svnr', 'orderDirection' => $orderDirection]) }}">SVNr</a>
                                                    </th>
                                                @endif
                                                @if ($orderBy == 'address')
                                                    <th>
                                                        <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'address', 'orderDirection' => $inverseOrderDirection]) }}">Adresse {!! $orderDirectionIndicator !!}</a>
                                                    </th>
                                                @else
                                                    <th>
                                                        <a href="{{ request()->fullUrlWithQuery(['orderBy' => 'address', 'orderDirection' => $orderDirection]) }}">Adresse</a>
                                                    </th>
                                                @endif
                                                <th class="text-center">Aktion</th>
                                            </tr>
                                            @foreach ($patients as $patient)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('patient', $patient->id) }}">
                                                            {{$patient->firstname }} {{$patient->lastname}}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{$patient->svnr}}
                                                    </td>
                                                    <td>
                                                        {{$patient->address}},
                                                        {{$patient->plz}} {{$patient->city}},
                                                        {{$patient->country}}
                                                    </td>
                                                    <td class="text-center">
                                                        <form method="post" action="/patient/{{$patient->id}}/delete">
                                                            @csrf
                                                            <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <div class="pagination-sm">
                                            {{ $patients->links() }}
                                        </div>
                                    @else
                                        Keine Patienten gefunden. <a href="{{ route('patients') }}">Alle Patienten anzeigen.</a>
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
