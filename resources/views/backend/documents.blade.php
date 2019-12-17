@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height mt-4">
    <div class="content">
        <div id="app">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header text-dark card-top"><i class="fas fa-file-alt mr-1"></i>{{ __('Patientenunterlagen') }}</div>
                            <div class="card-body">
                                @if(!empty($documents))
                                    <table class="table table-bordered table-hover table-sm table-responsive-sm">
                                        <tr>
                                            <th>Datum</th>
                                            <th>Patienten</th>
                                            <th>Beschreibung</th>
                                            <th>Pdf</th>
                                            <th class="text-center">Aktion</th>
                                        </tr>
                                        @foreach($documents as $document)
                                            <tr>
                                                <td>{{ $document->created_at->toDateString() }}</td>
                                                <td>{{ $document->patient->firstname }} {{ $document->patient->lastname }}, {{ $document->patient->svnr }}</td>
                                                <td>{{ $document->text }}</td>
                                                <td><a href="{{$document->pdf}}"><i class="fas fa-file-pdf fa-2x"></i></a></td>
                                                <td class="text-center">
                                                    <form method="post" action="/documents/{{$document->id}}/delete">
                                                        @csrf
                                                        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p>Keine Dokument vorhanden.</p>
                                @endif
                                <div class="pagination-sm">
                                    {{ $documents->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
