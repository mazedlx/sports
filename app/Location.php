<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The table name for locations
     *
     * @var string
     */
    protected $table = 'pool_location';

    /**
     * A location's players
     *
     * @access public
     * @return [type]
     */
    public function players()
    {
        return $this->belongsToMany('App\Player', 'pool_player_location', 'locid', 'playerid');
    }

    /**
     * A location's results
     *
     * @access public
     * @return [type]
     */
    public function results()
    {
        return $this->hasMany('App\Result', 'id_location');
    }
}
