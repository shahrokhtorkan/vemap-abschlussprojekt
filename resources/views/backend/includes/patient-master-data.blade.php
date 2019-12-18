@if(App\User::hasPermission('view-own-data') && $patient)
    <p>Sie sind Patient!</p>
    <h4>Meine Stammdaten</h4>
    <table class="table table-bordered table-hover table-sm table-responsive-sm mb-3">
        <tr>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Email</th>
            <th>SVNr</th>
            <th>Adresse</th>
            <th>PLZ</th>
            <th>Stadt</th>
            <th>Land</th>
        </tr>
        <tr>
            <td>{{ $patient->firstname }}</td>
            <td>{{ $patient->lastname }}</td>
            <td>{{ $patient->email }}</td>
            <td>{{ $patient->svnr}}</td>
            <td>{{ $patient->address}}</td>
            <td>{{ $patient->plz}}</td>
            <td>{{ $patient->city}}</td>
            <td>{{ $patient->country}}</td>
        </tr>
    </table>
@else
    Sie sind kein Patient.
@endif
