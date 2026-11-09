<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/api/games', [HomeController::class, 'apiGames'])->name('games.api');
Route::post('/booking', [BookingController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('booking.store');
Route::post('/booking/status', [BookingController::class, 'checkStatus'])
    ->middleware('throttle:15,1')
    ->name('booking.status');
