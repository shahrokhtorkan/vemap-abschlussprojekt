@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-5">
    <div class="content">
        {{--<div class="title text-center text-dark display-1 mb-5">
            <h1>Neue Dokument erstellen</h1>
        </div>--}}
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-user mr-1"></i>{{ __('Neue Dokument erstellen') }}</div>
                            <div class="card-body">
                                // TODO Undefined variable: $documents
                                @if(!empty($documents))
                                    <table class="table table-bordered table-hover table-responsive-sm">
                                        <tr>
                                            <th>Datum</th>
                                            <th>Patient</th>
                                            <th>Text</th>
                                        </tr>
                                        @foreach($documents as $document)
                                            <tr>
                                                <td>
                                                    {{ $document->created_at->toDateString() }}
                                                </td>
                                                <td>
                                                    {{ $document->patient->firstname }} {{ $document->patient->lastname }}, {{ $document->patient->svnr }}
                                                </td>
                                                <td>
                                                    {{ $document->text }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p>Keine Dokument vorhanden.</p>
                                @endif
                                {{--<div class="pagination-sm">
                                    {{ $documents->links() }}
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
