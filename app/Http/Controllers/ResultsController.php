<?php

namespace App\Http\Controllers;

use App\Day;
use App\Player;
use App\Result;
use App\Location;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function create(Day $day, Location $location)
    {
        return view('pool.createresults', [
            'day' => $day,
            'location' => $location,
            'players' => Player::havingLocation($location)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $results = collect($request->only('player', 'plus', 'minus'))
            ->transpose()
            ->map(function ($result) {
                Result::create([
                    'id_day' => request('day_id'),
                    'id_location' => request('location_id'),
                    'id_player' => $result[0],
                    'plus' => $result[1],
                    'minus' => $result[2],
                ]);
            });

        return redirect("/create/games/{$request->day_id}/$request->location_id");
    }
}
