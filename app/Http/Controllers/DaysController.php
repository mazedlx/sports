<?php

namespace App\Http\Controllers;

use App\Day;
use App\Location;
use App\Player;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    public function create()
    {
        return view('pool.createday', [
            'locations' => Location::whereIn('id', [
                Location::LOCATION_1,
                Location::LOCATION_2,
            ])
                ->pluck('name', 'id'),
            'players' => collect(Player::fullnames())
                ->pluck('name', 'id')
                ->prepend('Alle', 0),
        ]);
    }

    public function store(Request $request)
    {
        $day = Day::create([
            'date' => request('date'),
            'frames' => request('frames'),
            'id_payer' => request('id_payer'),
        ]);

        return redirect("/create/results/{$day->id}/{$request->location_id}");
    }
}
