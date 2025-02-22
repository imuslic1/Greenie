<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('leaderboards', function() {
    return view('leaderboards');
});

Route::get('/users/{user:slug}', [UserController::class, 'index'])->name('users.index');