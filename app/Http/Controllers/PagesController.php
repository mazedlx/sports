<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    const LOCATION_1 = 2;
    const LOCATION_2 = 8;

    public function __invoke()
    {
        return view('pool.index', [
            'locationIdOne' => self::LOCATION_1,
            'locationIdTwo' => self::LOCATION_2,
        ]);
    }
}
