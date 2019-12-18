<table class="table table-bordered table-hover table-sm table-responsive-sm">
    <tr>
        <th>Von</th>
        <th>Bis</th>
        <th>Patient</th>
        <th>Status</th>
        <th class="text-center">Aktion</th>
    </tr>
    @foreach($slots as $slot)
        <tr>
            <td>{{ $slot->start }}</td>
            <td>{{ $slot->end }}</td>
            <td>
                @if(App\User::hasPermission('admin-calendar'))
                    <form method="post" action="{{ "/appointment/{$slot->id}/assignpatient" }}">
                        @csrf
                        <select class="custom-select" name="patient_id" onchange="this.form.submit()">
                            @if($slot->patient)
                                <option value="">Kein Patient</option>
                            @else
                                <option selected="selected" value="">Kein Patient</option>
                            @endif
                            @forelse($patients as $patient)
                                @if($slot->patient && $slot->patient->id == $patient->id)
                                    <option selected="selected"
                                            value="{{ $patient->id }}">{{ $patient->lastname }}, {{ $patient->firstname }}</option>
                                @else
                                    <option value="{{ $patient->id }}">{{ $patient->lastname }}, {{ $patient->firstname }}</option>
                                @endif
                            @empty
                                <option selected="selected" value="">Keine Patienten gefunden</option>
                            @endforelse
                        </select>
                    </form>
                @else
                    {{$slot->patient ?? 'Kein Patient' }}
                @endif
            </td>
            <td>
                @if(App\User::hasPermission('admin-calendar'))
                    <form method="post" action="{{ "/appointment/{$slot->id}/setstatus" }}">
                        @csrf
                        <select class="custom-select" name="status" onchange="this.form.submit()">
                            @foreach($slotStatus as $status)
                                @if($slot->status == $status)
                                    <option selected="selected" value="{{ $status }}">{{ ucwords($status) }}</option>
                                @else
                                    <option
                                        value="{{ $status }}">{{ ucwords($status) }}</option>
                                @endif
                            @endforeach
                        </select>
                    </form>
                @else
                    {{$slot->status}}
                @endif
            </td>
            @if(App\User::hasPermission('admin-calendar'))
                <td class="text-center">
                    <form method="post" action="{{ "/appointments/{$slot->id}/destroy"}}">
                        @csrf
                        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
</table>
<div class="pagination-sm">
    {{ $slots->links() }}
</div>
