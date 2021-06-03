<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Performance</h2>
    <table>
        <thead>
            <tr>
                <th>Team</th>
                <th>Performance</th>
                <th>Siege</th>
                <th>Niederlagen</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($performances as $team => $performance)
            <tr>
                <td>{{ $team }}</td>
                <td>{{ $performance['score'] }}</td>
                <td>{{ $performance['plus'] }}</td>
                <td>{{ $performance['minus'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
