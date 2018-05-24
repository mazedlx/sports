<?php

use App\Day;
use App\Player;
use App\Location;

Route::get('/locations', function () {
    return Location::all();
});

Route::get('/players', function () {
    return Player::all();
});

Route::get('/locations/{location}/players', function ($location) {
    return Location::with('players')->findOrFail($location);
});

Route::get('/locations/{location}/results', function ($location) {
    return Location::with('results')->findOrFail($location);
});

Route::get('/days', function () {
    return Day::with('games', 'games.winner', 'games.loser')->latest()->paginate(10);
});
