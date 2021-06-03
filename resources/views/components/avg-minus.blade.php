@props(['avgMinuses'])

<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Ranking Avg. Minus</h2>
    <table>
        <thead>
            <th>Pos</th>
            <th>Name</th>
            <th>Score</th>
        </thead>
        <tbody>
            @forelse ($avgMinuses as $avg_minus)
            <tr>
                <td>{{ $avg_minus['0'] }}</td>
                <td>{{ $avg_minus['1'] }}</td>
                <td>{{ $avg_minus['2'] }}</td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
