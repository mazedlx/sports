<?php

namespace App;

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
        return $this->belongsTo('App\Player', 'id_payer');
    }

    public function results()
    {
        return $this->hasMany('App\Result', 'id_day');
    }

    public function games()
    {
        return $this->hasMany('App\Game', 'id_day');
    }

    public function scopeYear($query, $year)
    {
        return $query->whereBetween('pool_day.date', [$year . '-01-01', $year . '-12-31']);
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
