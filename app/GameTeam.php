<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameTeam extends Model
{
    protected $fillable = [
        'id_game',
        'id_team',
        'result'
    ];

    protected $table = 'pool_game_team';

    public function game()
    {
        return $this->hasMany(Game::class, 'id');
    }

    public function teamName()
    {
        return Team::findOrFail($this->id_team)->team;
    }
}
