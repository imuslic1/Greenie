<?php

use App\Http\Controllers\LeaderboardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{user:slug}', [UserController::class, 'index'])->name('users.index');

Route::get('/account', function () {
    return view('account_page');
});

Route::get('/leaderboards', [LeaderboardsController::class, 'index'])->name('leaderboards.index');

Route::get('/home', [HomeController::class, 'index'])->name('home');
