<?php

use App\Http\Controllers\LeaderboardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::post('/admin/toggle/offer/{offer_id}', [AdminController::class, 'toggleOfferStatus'])->name('admin.toggleOfferStatus');

Route::post('/admin/toggle/referral_code/{refferalCode_id}', [AdminController::class, 'toggleReferralCodeStatus'])->name('admin.toggleReferralCodeStatus');


Route::post('/admin/add/offer', [AdminController::class, 'addOffer'])->name('admin.addOffer');

Route::post('/admin/add/partner', [AdminController::class, 'addPartner'])->name('admin.addPartner');
