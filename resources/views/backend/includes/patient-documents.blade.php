@if(App\User::hasPermission('view-own-data'))
    <h4>Meine Dokumente</h4>
    <table class="table table-bordered table-hover table-sm table-responsive-sm mb-4">
        <tr>
            <th>Datum</th>
            <th>Beschreibung</th>
            <th class="text-center">Pdf</th>
            <th class="text-center">Aktion</th>
        </tr>
        @foreach($documents as $document)
            <tr>
                <td>{{ $document->created_at }}</td>
                <td>{{ $document->text }}</td>
                <td class="text-center"><a href="{{$document->pdf}}"><i class="fas fa-file-pdf fa-2x"></i></a></td>
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
    Sie haben kein Dokument.
@endif
