<?php

use Illuminate\Console\Application;
use Illuminate\Support\Facades\Route;
use Modules\Application\Http\Controllers\ApplicationController;

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
    Route::apiResource('application', ApplicationController::class)->names('application');
});

Route::get('/application',[ApplicationController::class,'getAllApplications'])->middleware('auth:sanctum');

Route::post('/application', [ApplicationController::class, 'createApplication'])->middleware('auth:sanctum');
