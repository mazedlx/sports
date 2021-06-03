<?php

namespace App\Http\Controllers;

use App\Day;
use App\Location;
use App\Player;
use App\Result;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function create(Day $day, Location $location)
    {
        return view('pool.createresults', [
            'day' => $day,
            'location' => $location,
            'players' => Player::havingLocation($location)->get(),
        ]);
    }

    public function store(Request $request)
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
        $lastPayers = Player::lastPayer($location, $year);
        $absentees = Player::absent($location, $year);
        $performances = Player::performance($location, $year, false);

        $scores = Player::performance($location, $year, true);
        $i = 1;
        $j = \count($scores);
        foreach ($scores as $team => $score) {
            if (1 === $i) {
                $scores[$team] = '<span class="w-full h-full px-2 py-2 bg-green-500">' . $score . '</span>';
            }
            if (2 === $i) {
                $scores[$team] = '<span class="w-full h-full px-2 py-2 bg-blue-500">' . $score . '</span>';
            }
            if ($i === $j) {
                $scores[$team] = '<span class="w-full h-full px-2 py-2 bg-yellow-600">' . $score . '</span>';
            }
            if ($i === $j - 1) {
                $scores[$team] = '<span class="w-full h-full px-2 py-2 bg-yellow-500">' . $score . '</span>';
            }
            $i++;
        }

        return view('pool.results', [
            'absentees' => $absentees,
            'avgMinuses' => $avgMinuses,
            'avgPluses' => $avgPluses,
            'lastPayers' => $lastPayers,
            'location' => $location,
            'maxMinuses' => $maxMinuses,
            'maxPluses' => $maxPluses,
            'payers' => $payers,
            'performances' => $performances,
            'players' => $location->players()->sortByName()->get(),
            'results' => Result::hasLocation($location)->year($year)->sortByDate()->get(),
            'avgScores' => $scoresAvg,
            'totalScores' => $scoresTotal,
            'scores' => $scores,
            'totalFrames' => $location->totalFrames($year),
            'year' => $year,
        ]);
    }
}
