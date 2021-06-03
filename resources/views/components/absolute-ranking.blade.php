@props(['totalScores'])

<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Absolutes Ranking</h2>
    <table>
        <thead>
            <th>Pos</th>
            <th>Name</th>
            <th>Score</th>
        </thead>
        <tbody>
            @forelse ($totalScores as $totalScore)
                <tr>
                    <td>{{ $totalScore['0'] }}</td>
                    <td>{{ $totalScore['1'] }}</td>
                    <td>{{ $totalScore['2'] }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
