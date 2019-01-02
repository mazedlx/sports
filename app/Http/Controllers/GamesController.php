<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Day;
use App\Game;
use App\Team;
use App\Location;
use App\GameTeam;
use App\Http\Requests;

class GamesController extends Controller
{
    public function show(Day $day)
    {
        $games = $day->games()->get();

        return view('pool.games', [
            'games' => $games,
        ]);
    }

    public function create(Day $day, Location $location)
    {
        return view('pool.creategames', [
            'day' => $day,
            'location' => $location,
            'frames' => $day->frames,
            'teams' => Team::hasLocation($location)
                ->pluck('team', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $games = collect($request->only('frame', 'winner', 'loser'))
            ->transpose()
            ->map(function ($result) {
                $game = Game::create([
                    'id_day' => request('day_id'),
                    'game_no' => $result[0],
                ]);
                GameTeam::create([
                    'id_game' => $game->id,
                    'id_team' => $result[1],
                    'result' => 1,
                ]);
                GameTeam::create([
                    'id_game' => $game->id,
                    'id_team' => $result[2],
                    'result' => 0,
                ]);
            });

        return redirect("/pool/" . date('Y') . "/{$request->location_id}");
    }
}
