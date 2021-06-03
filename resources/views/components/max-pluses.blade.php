@props(['maxPluses'])

<div class="px-4">
    <h2 class="font-semibold text-2xl py-4">Ranking Max. Plus</h2>
    <table>
        <thead>
            <th>Pos</th>
            <th>Name</th>
            <th>Score</th>
        </thead>
        <tbody>
            @forelse ($maxPluses as $maxPlus)
                <tr>
                    <td>{{ $maxPlus['0'] }}</td>
                    <td>{{ $maxPlus['1'] }}</td>
                    <td>{{ $maxPlus['2'] }}</td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
