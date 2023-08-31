<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public const LOCATION_1 = 2;
    public const LOCATION_2 = 10;

    protected $table = 'pool_location';

    public function players()
    {
        return $this->belongsToMany(Player::class, 'pool_player_location', 'locid', 'playerid');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'id_location');
    }

    public function totalFrames($year)
    {
        return Day::hasLocation($this)->year($year)->totalFrames() / $this->players()->sortByName()->get()->count();
    }
}
