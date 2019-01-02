<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'date',
        'frames',
        'id_payer'
    ];

    protected $table = 'pool_day';

    protected $casts = [
        'date' => 'date'
    ];

    public function player()
    {
        return $this->belongsTo(Player::class, 'id_payer');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'id_day');
    }

    public function games()
    {
        return $this->hasMany(Game::class, 'id_day');
    }

    public function scopeYear($query, $year)
    {
        $dt = Carbon::create($year, 1, 1);
        return $query->whereBetween('pool_day.date', [
            $dt->startOfYear()->format('Y-m-d'),
            $dt->endOfYear()->format('Y-m-d'),
        ]);
    }

    public function scopeTotalFrames($query)
    {
        return $query->sum('frames');
    }

    public function scopeHasLocation($query, Location $location)
    {
        return $query
            ->join('pool_results', 'pool_results.id_day', '=', 'pool_day.id')
            ->where('pool_results.id_location', '=', $location->id);
    }
}
