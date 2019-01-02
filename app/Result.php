<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Result extends Model
{
    protected $fillable = [
        'id_day',
        'id_player',
        'id_location',
        'plus',
        'minus'
    ];

    protected $table = 'pool_results';

    public function location()
    {
        return $this->belongsTo(Location::class, 'id_location');
    }
    public function day()
    {
        return $this->belongsTo(Day::class, 'id_day');
    }

    public function scopeHasLocation($query, Location $location)
    {
        return $query
            ->join('pool_location', 'pool_location.id', '=', 'pool_results.id_location')
            ->where('pool_location.id', '=', $location->id);
    }

    public function scopeYear($query, $year)
    {
        $dt = Carbon::create($year, 1, 1);

        return $query
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->whereBetween('pool_day.date', [
                $dt->startOfYear()->format('Y-m-d'),
                $dt->endOfYear()->format('Y-m-d'),
            ]);
    }

    public function scopeSortByDate($query)
    {
        return $query->orderBy('pool_day.date', 'asc')
            ->groupBy('pool_day.id');
    }

    public function scopeOfPlayer($query, Player $player)
    {
        return $query
            ->join('pool_player', 'pool_player.id', '=', 'pool_results.id_player')
            ->where('pool_player.id', '=', $player->id);
    }

    public function scopeOfDay($query, Day $day)
    {
        return $query
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->where('pool_day.id', '=', $day->id);
    }

    public function scopeOfYear($query, $year)
    {
        $dt = Carbon::create($year, 1, 1);

        return $query
            ->join('pool_day', 'pool_day.id', '=', 'pool_results.id_day')
            ->whereBetween('pool_day.date', [
                $dt->startOfYear()->format('Y-m-d'),
                $dt->endOfYear()->format('Y-m-d'),
            ]);
    }
}
