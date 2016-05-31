<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['id_day', 'game_no'];
    protected $table = 'pool_game';
}
