<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VAmpsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/vamps/latest', [VAmpsController::class, 'latest']);
Route::apiResource('/vamps', 'App\Http\Controllers\Api\VAmpsController');
