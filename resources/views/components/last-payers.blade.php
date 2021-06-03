@props(['lastPayers'])

<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Letzte Zahler</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>hat bezahlt am</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($lastPayers as $payer)
            <tr>
                <td>{{ $payer->name }}</td>
                <td>{{ $payer->date }}</td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
</div>
