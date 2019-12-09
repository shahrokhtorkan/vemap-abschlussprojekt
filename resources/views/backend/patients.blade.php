@extends('layouts.app')

@section('content')
{{--<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        <div class="title text-center text-dark display-1 mb-5">
            <h1>Patientenübersicht</h1>
        </div>--}}
<div id="app">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-dark"><i class="fas fa-user mr-1"></i>{{ __('Patientenübersicht') }}</div>
                    <div class="card-body">
                        <div class="card-body">
                            @if (count($patients) > 0)
                            <table id="example" class="table table-bordered table-hover">
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
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
