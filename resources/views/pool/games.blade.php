<table class="table table-auto border">
    <thead>
        <tr>
            <th class="cell">Frame #</th>
            <th class="cell">Gewinner</th>
            <th class="cell">Verlierer</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($games as $game)
        <tr>
            <td class="cell">{{ $game->game_no + 1 }}</td>
            <td class="cell">{{ $game->winner->first()->teamName() }}</td>
            <td class="cell">{{ $game->loser->first()->teamName() }}</td>
            {{-- <td class="cell">{{ App\Team::findOrFail($game->winner->first()->id_team)->team }}</td> --}}
            {{-- <td class="cell">{{ App\Team::findOrFail($game->loser->first()->id_team)->team }}</td> --}}
        </tr>
    @endforeach
    </tbody>
</table>
