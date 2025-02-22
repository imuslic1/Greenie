<?php

use App\Http\Controllers\Api\EmissionController;
use App\Http\Controllers\Api\OfferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/emissions', [EmissionController::class, 'updateUserEmission']);
Route::post('/offers', [OfferController::class, 'updateReferralCode']);
