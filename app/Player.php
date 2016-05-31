<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The table name for players
     *
     * @var string
     */
    protected $table = 'pool_player';

    public function locations()
    {
        return $this->belongsToMany('App\Location', 'pool_player_location', 'playerid', 'locid');
    }

    public function scopeHavingLocation($query, $location_id)
    {
        return $query
            ->join('pool_player_location', 'pool_player_location.playerid', '=', 'pool_player.id')
            ->where('pool_player_location.locid', $location_id);
    }

    public function scopeFullnames($location_id) {
        return \DB::table('pool_player')
            ->select(\DB::raw('id, CONCAT(pool_player.firstname," ",pool_player.name) AS playername'))
            ->join('pool_player_location', 'pool_player_location.playerid', '=', 'pool_player.id')
            ->whereIn('pool_player_location.locid', [2, 8])
            ->orderBy('pool_player.name', 'asc')
            ->get();
    }

    public function scopeSortByName($query)
    {
        return $query->orderBy('name', 'asc');
    }

    public function scopeAverage($query, $location_id, $year)
    {
        return \DB::table('pool_results')
            ->select(\DB::raw('ROUND(SUM(pool_results.plus)/SUM(pool_results.minus),3) AS score_avg, CONCAT(pool_player.firstname," ",pool_player.name) AS playername'))
            ->join('pool_player', 'pool_player.id', '=', 'pool_results.id_player')
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->where('pool_results.id_location', '=', $location_id)
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31'])
            ->groupBy('pool_player.id')
            ->get();
    }

    public function scopeTotal($query, $location_id, $year)
    {
        return \DB::table('pool_results')
            ->select(\DB::raw('SUM(pool_results.plus) AS score_total, CONCAT(pool_player.firstname," ",pool_player.name) AS playername'))
            ->join('pool_player', 'pool_player.id', '=', 'pool_results.id_player')
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->where('pool_results.id_location', '=', $location_id)
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31'])
            ->groupBy('pool_player.id')
            ->get();
    }

    public function scopeMaxPlus($query, $location_id, $year)
    {
        return \DB::table('pool_results')
            ->select(\DB::raw('MAX(pool_results.plus) AS max_plus, CONCAT(pool_player.firstname," ",pool_player.name) AS playername'))
            ->join('pool_player', 'pool_player.id', '=', 'pool_results.id_player')
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->where('pool_results.id_location', '=', $location_id)
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31'])
            ->groupBy('pool_player.id')
            ->get();
    }

    public function scopeMaxMinus($query, $location_id, $year)
    {
        return \DB::table('pool_results')
            ->select(\DB::raw('MAX(pool_results.minus) AS max_minus, CONCAT(pool_player.firstname," ",pool_player.name) AS playername'))
            ->join('pool_player', 'pool_player.id', '=', 'pool_results.id_player')
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->where('pool_results.id_location', '=', $location_id)
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31'])
            ->groupBy('pool_player.id')
            ->get();
    }

    public function scopeAvgPlus($query, $location_id, $year)
    {
        return \DB::table('pool_results')
            ->select(\DB::raw('AVG(pool_results.plus) AS avg_plus, CONCAT(pool_player.firstname," ",pool_player.name) AS playername'))
            ->join('pool_player', 'pool_player.id', '=', 'pool_results.id_player')
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->where('pool_results.id_location', '=', $location_id)
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31'])
            ->groupBy('pool_player.id')
            ->get();
    }

    public function scopeAvgMinus($query, $location_id, $year)
    {
        return \DB::table('pool_results')
            ->select(\DB::raw('AVG(pool_results.minus) AS avg_minus, CONCAT(pool_player.firstname," ",pool_player.name) AS playername'))
            ->join('pool_player', 'pool_player.id', '=', 'pool_results.id_player')
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->where('pool_results.id_location', '=', $location_id)
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31'])
            ->groupBy('pool_player.id')
            ->get();
    }

    public function scopePayer($query, $location_id, $year)
    {
        return \DB::table('pool_day')
            ->select(\DB::raw('COUNT(*) AS cnt, CONCAT(pool_player.firstname," ",pool_player.name) AS playername'))
            ->join('pool_player', 'pool_player.id', '=', 'pool_day.id_payer')
            ->orderBy('pool_player.name', 'asc')
            ->groupBy('pool_player.id')
            ->get();
    }

    public function scopeLastPayer($query, $location_id, $year)
    {
        return \DB::table('pool_day')
            ->select(\DB::raw('pool_day.date, CONCAT(pool_player.firstname," ",pool_player.name) AS playername'))
            ->join('pool_player', 'pool_player.id', '=', 'pool_day.id_payer')
            ->orderBy('pool_day.date', 'desc')
            ->take(6)
            ->get();
    }

    public function scopeAbsent($query, $location_id, $year)
    {
        return \DB::table('pool_player')
            ->select(\DB::raw('COUNT(*) AS cnt, CONCAT(pool_player.firstname," ",pool_player.name) AS playername'))
            ->join('pool_results', 'pool_results.id_player', '=', 'pool_player.id')
            ->join('pool_player_location', 'pool_player_location.playerid', '=', 'pool_player.id')
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31'])
            ->where('pool_results.plus', '=', 0)
            ->where('pool_results.minus', '=', 0)
            ->where('pool_results.id_location', $location_id)
            ->where('pool_player_location.locid', $location_id)
            ->orderBy('cnt', 'desc')
            ->groupBy('pool_player.id')
            ->get();
    }

    public function scopePerformance($query, $location_id, $year, $grid)
    {
        $results = [];
        $scores = [];

        $teams = \DB::table('pool_team')
            ->select('pool_team.team')
            ->join('pool_team_location', 'pool_team_location.id_team', '=', 'pool_team.id')
            ->where('pool_team_location.id_location', $location_id)
            ->orderBy('pool_team.team', 'asc')
            ->get();

        foreach ($teams as $team) {
            $results[$team->team]['score'] = 0.000;
        }

        $scores_plus = \DB::table('pool_day')
            ->select(\DB::raw('COUNT(*) AS cnt, pool_team.team'))
            ->join('pool_game', 'pool_game.id_day', '=', 'pool_day.id')
            ->join('pool_game_team', 'pool_game_team.id_game', '=', 'pool_game.id')
            ->join('pool_team', 'pool_team.id', '=', 'pool_game_team.id_team')
            ->join('pool_team_location', 'pool_team_location.id_team', '=', 'pool_team.id')
            ->where('pool_team_location.id_location', '=', $location_id)
            ->where('pool_game_team.result', '=', 1)
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31'])
            ->groupBy('pool_team.id')
            ->orderBy('cnt', 'desc')
            ->get();

        foreach ($scores_plus as $score_plus) {
                $results[$score_plus->team]['plus'] = $score_plus->cnt;
        }

        $scores_minus = \DB::table('pool_day')
            ->select(\DB::raw('COUNT(*) AS cnt, pool_team.team'))
            ->join('pool_game', 'pool_game.id_day', '=', 'pool_day.id')
            ->join('pool_game_team', 'pool_game_team.id_game', '=', 'pool_game.id')
            ->join('pool_team', 'pool_team.id', '=', 'pool_game_team.id_team')
            ->join('pool_team_location', 'pool_team_location.id_team', '=', 'pool_team.id')
            ->where('pool_team_location.id_location', '=', $location_id)
            ->where('pool_game_team.result', '=', 0)
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31'])
            ->groupBy('pool_team.id')
            ->orderBy('cnt', 'desc')
            ->get();

        foreach ($scores_minus as $score_minus) {
                $results[$score_minus->team]['minus'] = $score_minus->cnt;
        }

        foreach ($results as $team => $vals) {
            if (! array_key_exists('plus', $vals)) {
                $vals['plus'] = 0;
            }
            if (! array_key_exists('minus', $vals)) {
                $vals['minus'] = 1;
            }
            $results[$team]['score'] = number_format($vals['plus'] / $vals['minus'], 3);
        }

        foreach ($results as $team => $vals) {
            $scores[$team] = $vals['score'];
        }
        arsort($scores);
        foreach ($scores as $team => $score) {
            $top[] = $team;
            if (! array_key_exists('plus', $results[$team])) {
                $results[$team]['plus'] = 0;
            }
            if (! array_key_exists('minus', $results[$team])) {
                $results[$team]['minus'] = 0;
            }
            if ($scores[$team] == '') {
                $scores[$team] = 0.000;
            }
        }
        arsort($results);
        if($grid) {
            return $scores;
        } else {
            return $results;
        }
    }
}
