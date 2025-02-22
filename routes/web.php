<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{user:slug}', [UserController::class, 'index'])->name('users.index');

Route::get('/home', [HomeController::class, 'index'])->name('home');