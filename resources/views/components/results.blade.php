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
    class="overflow-hidden border-b border-gray-200 shadow-sm sm:rounded-lg"
>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                >Datum</th>
                                @forelse ($players as $player)
                                <th
                                    scope="col"
                                    colspan="2"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                >{{ $player->fullName }}</th>
                                @empty
                                @endforelse
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Frames</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($results as $date => $result)
                            <tr class="@if($loop->index % 2 === 0) bg-white @else bg-gray-50 @endif">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    <a
                                        @click.prevent="getGames({{ $result['day_id'] }})"
                                        href="{{ route('game', $result['day_id']) }}"
                                        class="underline text-grey-900"
                                    >{{ $date }}</a>
                                </td>
                            @forelse ($result['results'] as $player => $score)
                                <td class="px-6 py-4 text-sm font-medium text-right text-gray-900 whitespace-nowrap">{{ $score['plus'] }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-right text-gray-900 whitespace-nowrap">{{ $score['minus'] }}</td>
                            @empty
                            @endforelse
                            <td class="px-6 py-4 text-sm font-medium text-right text-gray-900 whitespace-nowrap">{{ $result['total'] }}</td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                >Gesamt</th>
                            @foreach ($sums as $sum)
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                >{{ $sum->sum_plus }}</th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase"
                                >{{ $sum->sum_minus }}</th>
                            @endforeach
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase"
                                >{{ $totalFrames }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div
        class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
        x-show="showModal"
        x-transition:enter="ease-in-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
    >
        <div class="w-1/3 px-6 py-4 mx-auto text-left bg-white rounded-sm shadow-lg">
            <div class="w-5/6 mx-auto"
                @click.away="showModal = false"
            >
                <h1 class="text-3xl font-bold" x-text="`Games für ${date}`"></h1>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow-sm sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                        >Frame #</th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                        >Gewinner</th>
                                        <th
                                            scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                        >Verlierer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="(game, index) in games">
                                        <tr x-bind:class="{
                                            'bg-white': index % 2 === 0,
                                            'bg-gray-50': index % 2 !== 0,
                                        }">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap" x-text="game.game_no + 1"></td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap" x-text="game.winner[0].team.team"></td>
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap" x-text="game.loser[0].team.team"></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
