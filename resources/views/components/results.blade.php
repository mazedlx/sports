@props(['players', 'results', 'year', 'totalFrames'])

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
        @forelse ($results as $result)
            <tr>
                <td>
                    <a
                        href="{{ route('game', $result->day()->first()->id) }}"
                        class="underline text-grey-900"
                    >{{ $result->day()->first()->date->format('d.m.Y') }}</a>
                </td>
            @forelse ($players as $player)
                <td>{{ $result->ofPlayer($player)->ofDay($result->day()->first())->get()->first()->plus }}</td>
                <td>{{ $result->ofPlayer($player)->ofDay($result->day()->first())->get()->first()->minus }}</td>
            @empty
            @endforelse
                <td >{{ $result->day()->first()->frames }}</td>
            </tr>
        @empty
        @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th scope="col">Gesamt</th>
        @forelse ($players as $player)
            @if ($results-> count() > 0)
                <th scope="col">{{ $results->first()->ofPlayer($player)->ofYear($year)->sum('plus') }}</th>
                <th scope="col">{{ $results->first()->ofPlayer($player)->ofYear($year)->sum('minus') }}</th>
            @endif
        @empty
        @endforelse
                <th scope="col">{{ $totalFrames }}</th>
            </tr>
        </tfoot>
    </table>
</div>
