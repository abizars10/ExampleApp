<?php

use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PlayerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//teams
// Route::apiResource('/teams', TeamController::class);s