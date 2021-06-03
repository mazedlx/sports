@extends('layouts.app')

@section('content')
<div class="w-5/6 mx-auto">
    <h1 class="text-3xl font-bold">Games für {{ $day->date->format('d.m.Y') }}</h1>
    <table>
        <thead>
            <tr>
                <th >Frame #</th>
                <th >Gewinner</th>
                <th >Verlierer</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($games as $game)
            <tr>
                <td >{{ $game->game_no + 1 }}</td>
                <td >{{ $game->winner->first()->teamName() }}</td>
                <td >{{ $game->loser->first()->teamName() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
