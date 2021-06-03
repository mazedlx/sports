@props(['players', 'results', 'year', 'totalFrames', 'sums'])

<div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr class="">
                <th scope="col">Datum</th>
            @forelse ($players as $player)
                <th scope="col" colspan="2">{{ $player->fullName }}</th>
            @empty
            @endforelse
                <th scope="col">Frames</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($results as $date => $result)
            <tr>
                <td>
                    <a href="{{ route('game', $result['day_id']) }}" class="underline text-grey-900">
                        {{ $date }}
                    </a>
                </td>
            @forelse ($result['results'] as $player => $score)
                <td>{{ $score['plus'] }}</td>
                <td>{{ $score['minus'] }}</td>
            @empty
            @endforelse
                <td >{{ $result['total'] }}</td>
            </tr>
        @empty
        @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">Gesamt</th>
            @foreach ($sums as $sum)
            <th scope="col">{{ $sum->sum_plus }}</th>
            <th scope="col">{{ $sum->sum_minus }}</th>
            @endforeach
                <th scope="col">{{ $totalFrames }}</th>
            </tr>
        </tfoot>
    </table>
</div>
