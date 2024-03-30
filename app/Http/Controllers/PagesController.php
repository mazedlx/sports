<?php

namespace App\Http\Controllers;

use App\Location;

class PagesController extends Controller
{
    public function __invoke()
    {
        return view('pool.index', [
            'locationIdOne' => Location::LOCATION_1,
            'locationIdTwo' => Location::LOCATION_2,
        ]);
    }
}
