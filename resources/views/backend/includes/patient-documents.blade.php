@if(App\User::hasPermission('view-own-data'))
    <h2>Meine Dokumente</h2>
    <table class="table table-bordered table-hover table-sm table-responsive-sm mb-3">
        <tr>
            <th>Beschreibung</th>
            <th>Pdf</th>
            <th>Datum</th>
        </tr>

        @foreach($documents as $document)
            <tr>
                <td>{{ $document->text }}</td>
                <td><a href="{{$document->pdf}}"><i class="fas fa-file-pdf fa-2x"></i></a></td>
                <td>{{ $document->created_at }}</td>
            </tr>
        @endforeach
    </table>
@else
    Sie haben kein Dokument.
@endif
