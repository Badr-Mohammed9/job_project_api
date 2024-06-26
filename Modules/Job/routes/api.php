<?php

use Illuminate\Support\Facades\Route;
use Modules\Job\Http\Controllers\JobController;
use Modules\Job\Http\Controllers\OfferController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('job', JobController::class)->names('job');
});

Route::get('/job',[JobController::class,'getOffers'])->middleware('auth:sanctum');

Route::post('/job',[JobController::class,'create'])->middleware('auth:sanctum');

Route::post('/job/filter',[JobController::class,'filter'])->middleware('auth:sanctum');

Route::get('/job/{id}',[JobController::class,'getOffer'])->middleware('auth:sanctum');

Route::post('/job/test',function(){
    return response()->json([
        'data'=>'hey'
    ]);
});

