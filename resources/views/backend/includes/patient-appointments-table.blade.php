<table class="table table-bordered table-hover table-sm table-responsive-sm">
    <tr>
        <th>Slot</th>
        <th>Behandler</th>
        <th>Status</th>
        <th>Aktion</th>
    </tr>

    @error('status')
    <p class="validation-error">{{ $message }}</p>
    @enderror
    @foreach($slots as $slot)
        <tr>
            <td>
                {{ $slot->start->format('D d.m. H:i') }} &ndash; {{ $slot->end->format('H:i') }}
            </td>
            <td>
                {{$slot->user->name ?? 'Kein Behandler' }}
            </td>
            <td>
                {{$slot->status}}
            </td>
            <td>
                <form method="post" action=" {{ "/appointments/{$slot->id}/cancel" }}">
                    @csrf
                    <button type="submit">Stornieren</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
