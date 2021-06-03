@props(['avgPluses'])

<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Ranking Avg. Plus</h2>
    <table>
        <thead>
            <th>Pos</th>
            <th>Name</th>
            <th>Score</th>
        </thead>
        <tbody>
            @forelse ($avgPluses as $avg_plus)
                <tr>
                    <td>{{ $avg_plus['0'] }}</td>
                    <td>{{ $avg_plus['1'] }}</td>
                    <td>{{ $avg_plus['2'] }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
