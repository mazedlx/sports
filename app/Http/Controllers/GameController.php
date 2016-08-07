<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Day;

class GameController extends Controller
{
    public function show($id_day)
    {
        $games = Day::findOrFail($id_day)->games()->get();

        return view('pool.games')
            ->with('games', $games);
            
    }
}
