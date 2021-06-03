@props(['avgScores'])

<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Relatives Ranking</h2>
    <table>
        <thead>
            <th>Pos</th>
            <th>Name</th>
            <th>Score</th>
        </thead>
        <tbody>
            @forelse ($avgScores as $avgScore)
                <tr>
                    <td>{{ $avgScore['0'] }}</td>
                    <td>{{ $avgScore['1'] }}</td>
                    <td>{{ $avgScore['2'] }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
