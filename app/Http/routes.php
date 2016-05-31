<?php

Route::get('/', 'PoolController@index');
Route::get('/sports', 'PoolController@index');
Route::get('/pool/{year}/{locaton_id}', 'PoolController@show');
Route::get('/sports/pool/{year}/{locaton_id}', 'PoolController@show');

Route::get('/create/day', 'PoolController@createDay');
Route::get('/create/results/{day_id}/{location_id}', 'PoolController@createResults');
Route::get('/create/games/{day_id}/{location_id}', 'PoolController@createGames');

Route::post('/store/day', 'PoolController@storeDay');
Route::post('/store/results', 'PoolController@storeResults');
Route::post('/store/games', 'PoolController@storeGames');
