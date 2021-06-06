@props(['players', 'results', 'year', 'totalFrames', 'sums'])

<div
    x-cloak
    x-data="{
        games: [],
        date: '',
        showModal: false,
        async getGames(dayId) {
            const response = await fetch(`/games/${dayId}`);
            const data = await response.json();
            this.date = data.date;
            this.games = data.games;
            this.showModal = true;
        },
        showGames() {
            return ``;
        }
    }"
    @keydown.escape="showModal = false"
    class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg"
>
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
                    <a @click.prevent="getGames({{ $result['day_id'] }})" href="{{ route('game', $result['day_id']) }}" class="underline text-grey-900">
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


    <div
        class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show="showModal"
        x-transition:enter="ease-in-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
    >
        <div class="w-1/3 px-6 py-4 mx-auto text-left bg-white rounded shadow-lg">
            <div class="w-5/6 mx-auto"
                @click.away="showModal = false"
            >
                <h1 class="text-3xl font-bold" x-text="`Games für ${date}`"></h1>
                <table>
                    <thead>
                        <tr>
                            <th >Frame #</th>
                            <th >Gewinner</th>
                            <th >Verlierer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="game in games">
                            <tr>
                                <td x-text="game.game_no + 1"></td>
                                <td x-text="game.winner[0].team.team"></td>
                                <td x-text="game.loser[0].team.team"></td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
