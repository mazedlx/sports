<?php

Auth::routes(['register' => false]);


Route::get('/', 'PageController');
Route::get('/sports', 'PageController');

Route::get('/pool/{year}/{location}', 'PoolController@show');
Route::get('/sports/pool/{year}/{location}', 'PoolController@show');

Route::get('/game/{id}', 'GameController@show');

Route::middleware('auth')->group(function () {
    Route::get('/create/day', 'PoolController@createDay');
    Route::get('/create/results/{day}/{location}', 'PoolController@createResults');
    Route::get('/create/games/{day}/{location}', 'PoolController@createGames');

    Route::post('/store/day', 'PoolController@storeDay');
    Route::post('/store/results', 'PoolController@storeResults');
    Route::post('/store/games', 'PoolController@storeGames');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
