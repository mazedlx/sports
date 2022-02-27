<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false, // Routes of Registration
    'reset' => false,    // Routes of Password Reset
    'verify' => false,   // Routes of Email Verification
]);



Route::get('/', 'PagesController');
Route::get('sports', 'PagesController');

Route::get('pool/{year}/{location}', 'ResultsController@show');
Route::get('sports/pool/{year}/{location}', 'ResultsController@show');

Route::get('games/{day}', 'GamesController@show')->name('game');

Route::middleware('auth')->group(function () {
    Route::get('create/day', 'DaysController@create');
    Route::get('create/results/{day}/{location}', 'ResultsController@create');
    Route::get('create/games/{day}/{location}', 'GamesController@create');

    Route::post('store/day', 'DaysController@store')->name('days.store');
    Route::post('store/results', 'ResultsController@store')->name('results.store');
    Route::post('store/games', 'GamesController@store')->name('games.store');
});
