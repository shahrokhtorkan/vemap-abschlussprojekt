@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        <div class="title text-center text-dark display-1 mb-5">
            <h1>Template</h1>
        </div>


        @if (count($patients) > 0)

            <table class="table table-responsive-md">
                <thead>
                <tr>
                    <th scope="col"><a
                            href="#">SVNr
                            <i
                                class="fa fa-sort" aria-hidden="true"></i>
                        </a>
                    </th>
                    <th scope="col"><a
                            href="#">Name
                            <i
                                class="fa fa-sort" aria-hidden="true"></i>
                        </a>
                    </th>
                    <th scope="col"><a
                            href="#">Adresse
                            <i
                                class="fa fa-sort" aria-hidden="true"></i>
                        </a>
                    </th>
                    <th scope="col"><a
                            href="#">PLZ
                            <i
                                class="fa fa-sort" aria-hidden="true"></i>
                        </a>
                    </th>
                    <th scope="col"><a
                            href="#">Ort
                            <i
                                class="fa fa-sort" aria-hidden="true"></i>
                        </a>
                    </th>
                    <th scope="col"><a
                            href="#">Land
                            <i
                                class="fa fa-sort" aria-hidden="true"></i>
                        </a>
                    </th>
                    <th scope="col">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <th class="patientSVNr" scope="row">1{{ $patient -> svnr }}</th>
                        <th class="patientName" scope="row">{{ $patient -> lastname }}, {{ $patient -> firstname }}</th>
                        <th class="patientAddress" scope="row">{{ $patient -> address }}</th>
                        <th class="patientPLZ" scope="row">{{ $patient -> plz }}</th>
                        <th class="patientCity" scope="row">{{ $patient -> city }}</th>
                        <th class="patientCountry" scope="row">{{ $patient -> country }}</th>
                        <th class="patientControl" scope="row"><a href="#"></a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Keine Patienten gefunden.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


    </div>
</div>
@endsection
