<?php

use App\Http\Controllers\DaysController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ResultsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false, // Routes of Registration
    'reset' => false,    // Routes of Password Reset
    'verify' => false,   // Routes of Email Verification
]);

Route::get('/', PagesController::class)->name('/');

Route::get('pool/{year}/{location}', [ResultsController::class, 'show'])
    ->name('results');

Route::get('games/{day}', [GamesController::class, 'show'])->name('game');

Route::middleware('auth')->group(function () {
    Route::get('create/day', [DaysController::class, 'create']);
    Route::get(
        'create/results/{day}/{location}',
        [ResultsController::class, 'create']
    );
    Route::get(
        'create/games/{day}/{location}',
        [GamesController::class, 'create']
    );

    Route::post('store/day', [DaysController::class, 'store'])
        ->name('days.store');
    Route::post('store/results', [ResultsController::class, 'store'])
        ->name('results.store');
    Route::post('store/games', [GamesController::class, 'store'])
        ->name('games.store');
});
