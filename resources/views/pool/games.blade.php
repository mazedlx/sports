<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Frame #</th>
            <th>Gewinner</th>
            <th>Verlierer</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($games as $game)
        <tr>
            <td>{{ $game->game_no + 1 }}</td>
            <td>{{ App\Team::findOrFail($game->winner->first()->id_team)->team }}</td>
            <td>{{ App\Team::findOrFail($game->loser->first()->id_team)->team }}</td>
        </tr>
    @endforeach        
    </tbody>
</table>