<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LeaderboardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/users/{user:slug}', [UserController::class, 'index'])->name('users.index');

Route::get('/leaderboards', [LeaderboardsController::class, 'index'])->name('leaderboards.index');
Route::get('/offers/{offer}', [OfferController::class, 'index'])->name('offers');
Route::post('/offers/{offer}', [OfferController::class, 'store'])->name('offers');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'index'])->name('logout');
