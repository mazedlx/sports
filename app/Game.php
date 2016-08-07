<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['id_day', 'game_no'];

    protected $table = 'pool_game';

    public function winner()
    {
        return $this->hasMany('App\GameTeam','id_game')->where('result', '=', 1);
    }

    public function loser()
    {
        return $this->hasMany('App\GameTeam','id_game')->where('result', '=', 0);
    }
}
