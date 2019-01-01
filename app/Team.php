<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'pool_team';

    public function games()
    {
        return $this->hasMany('App\Game');
    }

    public function scopeHasLocation($query, Location $location)
    {
        return $query
            ->select('pool_team.*')
            ->join('pool_team_location', 'pool_team_location.id_team', '=', 'pool_team.id')
            ->where('pool_team_location.id_location', '=', $location->id)
            ->orderBy('pool_team.team', 'asc');
    }
}
