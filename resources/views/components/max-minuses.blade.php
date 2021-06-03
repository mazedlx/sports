@props(['maxMinuses'])

<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Ranking Max. Minus</h2>
    <table>
        <thead>
            <th>Pos</th>
            <th>Name</th>
            <th>Score</th>
        </thead>
        <tbody>
            @forelse ($maxMinuses as $maxMinus)
                <tr>
                    <td>{{ $maxMinus['0'] }}</td>
                    <td>{{ $maxMinus['1'] }}</td>
                    <td>{{ $maxMinus['2'] }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
