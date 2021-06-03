@props(['payers'])

<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Wer hat wie oft bezahlt</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>hat wie oft bezahlt</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payers as $payer)
            <tr>
                <td>{{ $payer->name }}</td>
                <td>{{ $payer->cnt }}</td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
