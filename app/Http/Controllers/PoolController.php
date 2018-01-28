<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Day;
use App\Location;
use App\Player;
use App\Result;
use App\Game;
use App\GameTeam;
use App\Team;

class PoolController extends Controller
{
    public function getRanking($array, $updown)
    {
        $oldvalue = 1;
        $updown == "up" ? asort($array) : arsort($array);
        $tabledata = [];
        $i = 1;
        $n = 0;
        foreach ($array as $playername => $value) {
            if ($oldvalue == $value) { // ex aequo
                $show = $i - 1 - $n;
                $n++;
            } else {
                $show = $i;
                $n = 0;
            }
            $oldvalue = $value;

            $tabledata[] = [
                $show,
                $playername,
                number_format($value, 3, ',', '.')
            ];
            $i++;
        }
        return $tabledata;
    }

    public function index()
    {
        return view('pool.index');
    }

    public function show($year, $location_id)
    {
        foreach (Player::Average($location_id, $year) as $score) {
            $average_scores[$score->playername] = $score->score_avg;
        }
        $scores_avg = $this->getRanking($average_scores, 'down');

        foreach (Player::Total($location_id, $year) as $score) {
            $total_scores[$score->playername] = $score->score_total;
        }
        $scores_total = $this->getRanking($total_scores, 'down');

        foreach (Player::maxPlus($location_id, $year) as $score) {
            $max_pluses[$score->playername] = $score->max_plus;
        }
        $max_pluses = $this->getRanking($max_pluses, 'down');

        foreach (Player::maxMinus($location_id, $year) as $score) {
            $max_minuses[$score->playername] = $score->max_minus;
        }
        $max_minuses = $this->getRanking($max_minuses, 'up');

        foreach (Player::avgPlus($location_id, $year) as $score) {
            $avg_pluses[$score->playername] = $score->avg_plus;
        }
        $avg_pluses = $this->getRanking($avg_pluses, 'down');

        foreach (Player::avgMinus($location_id, $year) as $score) {
            $avg_minuses[$score->playername] = $score->avg_minus;
        }
        $avg_minuses = $this->getRanking($avg_minuses, 'up');

        $payers = Player::payer($location_id, $year);
        $last_payers = Player::lastPayer($location_id, $year);
        $absentees = Player::absent($location_id, $year);
        $performances = Player::performance($location_id, $year, false);

        $scores = Player::performance($location_id, $year, true);
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

        return view('pool.results')
            ->with('location', Location::findOrFail($location_id))
            ->with('year', $year)
            ->with('players', Location::findOrFail($location_id)->players()->sortByName()->get())
            ->with('results', Result::hasLocation($location_id)->year($year)->sortByDate()->get())
            ->with('totalFrames', Day::hasLocation($location_id)->year($year)->totalFrames() / Location::findOrFail($location_id)->players()->sortByName()->get()->count())
            ->with('scores_avg', $scores_avg)
            ->with('scores_total', $scores_total)
            ->with('max_pluses', $max_pluses)
            ->with('max_minuses', $max_minuses)
            ->with('avg_pluses', $avg_pluses)
            ->with('avg_minuses', $avg_minuses)
            ->with('payers', $payers)
            ->with('last_payers', $last_payers)
            ->with('absentees', $absentees)
            ->with('performances', $performances)
            ->with('scores', $scores);
    }

    public function createDay()
    {
        return view('pool.createday')
            ->with('locations_id', Location::whereIn('id', [2, 8])->pluck('name', 'id'))
            ->with('payers_id', collect(Player::fullnames())->pluck('playername', 'id')->prepend('Alle', 0));
    }

    public function storeDay(Request $request)
    {
        $day = Day::create($request->all());

        return redirect('/create/results/' . $day->id . '/' . $request->location_id);
    }

    public function createResults($day_id, $location_id)
    {
        return view('pool.createresults')
            ->with('day_id', $day_id)
            ->with('location_id', $location_id)
            ->with('players', Player::havingLocation($location_id)->get());
    }

    public function storeResults(Request $request)
    {
        $plus = $request->plus;
        $minus = $request->minus;

        foreach ($plus as $player_id => $p) {
            Result::create([
                'id_day' => $request->day_id,
                'id_location' => $request->location_id,
                'id_player' => $player_id,
                'plus' => $plus[$player_id],
                'minus' => $minus[$player_id]
            ]);
        }

        return redirect('/create/games/' . $request->day_id . '/' . $request->location_id);
    }

    public function createGames($day_id, $location_id)
    {
        return view('pool.creategames')
            ->with('day_id', $day_id)
            ->with('location_id', $location_id)
            ->with('frames', Day::findOrFail($day_id)->frames)
            ->with('teams_id', Team::hasLocation($location_id)->pluck('team', 'id'));
    }

    public function storeGames(Request $request)
    {
        $winner = $request->winner;
        $loser = $request->loser;

        for ($i = 0; $i < $request->frames; $i++) {
            $game = Game::create([
                'id_day' => $request->day_id,
                'game_no' => $i
            ]);

            $game_team = GameTeam::create([
                'id_game' => $game->id,
                'id_team' => $winner[$i],
                'result' => 1
            ]);

            $game_team = GameTeam::create([
                'id_game' => $game->id,
                'id_team' => $loser[$i],
                'result' => 0
            ]);
        }

        return redirect('/pool/' . date('Y') . '/' . $request->location_id);
    }
}
