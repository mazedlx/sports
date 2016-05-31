<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['id_day', 'id_player', 'id_location', 'plus', 'minus'];
    /**
     * The result's table
     *
     * @var string
     */
    protected $table = 'pool_results';

    /**
     * A result's location
     *
     * @access public
     * @return [type]
     */
    public function location()
    {
        return $this->belongsTo('App\Location', 'id_location');
    }

    /**
     * A result's day
     *
     * @access public
     * @return [type]
     */
    public function day()
    {
        return $this->belongsTo('App\Day', 'id_day');
    }

    public function scopeHasLocation($query, $location_id)
    {
        return $query
            ->join('pool_location', 'pool_location.id', '=', 'pool_results.id_location')
            ->where('pool_location.id', '=', $location_id);
    }

    public function scopeYear($query, $year)
    {
        return $query
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31']);
    }

    public function scopeSortByDate($query)
    {
        return $query->orderBy('pool_day.date', 'asc')->groupBy('pool_day.id');
    }

    public function scopeOfPlayer($query, $player_id)
    {
        return $query
            ->join('pool_player', 'pool_player.id', '=', 'pool_results.id_player')
            ->where('pool_player.id', '=', $player_id);

    }

    public function scopeOfDay($query, $day_id)
    {
        return $query
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->where('pool_day.id', '=', $day_id);
    }

    public function scopeOfYear($query, $year)
    {
        return $query
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31']);
    }
}
