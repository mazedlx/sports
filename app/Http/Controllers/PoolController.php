<?php

namespace App\Http\Controllers;

use App\Day;
use App\Game;
use App\Team;
use App\Player;
use App\Result;
use App\Location;
use App\GameTeam;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    const LOCATION_1 = 2;
    const LOCATION_2 = 8;

    public function show($year, Location $location)
    {
        $scoresAvg = getRanking(
            Player::average($location, $year)->mapWithKeys(function ($player) {
                return [$player->name => $player->score_avg];
            })->toArray(),
            'down'
        );

        $scoresTotal = getRanking(
            Player::total($location, $year)->mapWithKeys(function ($player) {
                return [$player->name => $player->score_total];
            })->toArray(),
            'down'
        );

        $maxPluses = getRanking(
            Player::maxPlus($location, $year)->mapWithKeys(function ($player) {
                return [$player->name => $player->max_plus];
            })->toArray(),
            'down'
        );

        $maxMinuses = getRanking(
            Player::maxMinus($location, $year)->mapWithKeys(function ($player) {
                return [$player->name => $player->max_minus];
            })->toArray(),
            'up'
        );

        $avgPluses = getRanking(
            Player::avgPlus($location, $year)->mapWithKeys(function ($player) {
                return [$player->name => $player->avg_plus];
            })->toArray(),
            'down'
        );

        $avgMinuses = getRanking(
            Player::avgMinus($location, $year)->mapWithKeys(function ($player) {
                return [$player->name => $player->avg_minus];
            })->toArray(),
            'up'
        );

        $payers = Player::payer($location, $year);
        $last_payers = Player::lastPayer($location, $year);
        $absentees = Player::absent($location, $year);
        $performances = Player::performance($location, $year, false);

        $scores = Player::performance($location, $year, true);
        $i = 1;
        $j = count($scores);
        foreach ($scores as $team => $score) {
            if ($i === 1) {
                $scores[$team] = '<span data-top="1">' . $score . '</span>';
            }
            if ($i === 2) {
                $scores[$team] = '<span data-top="2">' . $score . '</span>';
            }
            if ($i == $j) {
                $scores[$team] = '<span data-top="last">' . $score . '</span>';
            }
            if ($i == $j - 1) {
                $scores[$team] = '<span data-top="penultimate">' . $score . '</span>';
            }
            $i++;
        }
        return view('pool.results', [
            'absentees' => $absentees,
            'avg_minuses' => $avgMinuses,
            'avg_pluses' => $avgPluses,
            'last_payers' => $last_payers,
            'location' => $location,
            'max_minuses' => $maxMinuses,
            'max_pluses' => $maxPluses,
            'payers' => $payers,
            'performances' => $performances,
            'players' => $location->players()->sortByName()->get(),
            'results' => Result::hasLocation($location)->year($year)->sortByDate()->get(),
            'scores_avg' => $scoresAvg,
            'scores_total' => $scoresTotal,
            'scores' => $scores,
            'totalFrames' => $location->totalFrames($year),
            'year' => $year,
        ]);
    }

    public function createDay()
    {
        return view('pool.createday', [
            'locations' => Location::whereIn('id', [
                    self::LOCATION_1,
                    self::LOCATION_2
                ])
                ->pluck('name', 'id'),
            'players' => collect(Player::fullnames())->pluck('playername', 'id')->prepend('Alle', 0)
        ]);
    }

    public function storeDay(Request $request)
    {
        $day = Day::create([
            'date' => request('date'),
            'frames' => request('frames'),
            'id_payer' => request('id_payer'),
        ]);
        return redirect("/create/results/{$day->id}/{$request->location_id}");
    }

    public function createResults(Day $day, Location $location)
    {
        return view('pool.createresults', [
            'day' => $day,
            'location' => $location,
            'players' => Player::havingLocation($location)->get(),
        ]);
    }

    public function storeResults(Request $request)
    {
        $results = collect($request->only('player', 'plus', 'minus'))
            ->transpose()
            ->map(function ($result) {
                Result::create([
                    'id_day' => request('day_id'),
                    'id_location' => request('location_id'),
                    'id_player' => $result[0],
                    'plus' => $result[1],
                    'minus' => $result[2],
                ]);
            });

        return redirect("/create/games/{$request->day_id}/$request->location_id");
    }

    public function createGames(Day $day, Location $location)
    {
        return view('pool.creategames', [
            'day' => $day,
            'location' => $location,
            'frames' => $day->frames,
            'teams' => Team::hasLocation($location)->pluck('team', 'id'),
        ]);
    }

    public function storeGames(Request $request)
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

        return redirect("/pool/" . date('Y'). "/{$request->location_id}");
    }
}
