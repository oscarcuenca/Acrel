<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/UploadMeterRealTimeData', [App\Http\Controllers\MeterDataController::class, 'store']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

