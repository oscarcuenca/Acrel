<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SensorDataController;

// Ruta predeterminada que devuelve una vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta que redirige a un controlador llamado HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Ruta para manejar datos de sensores
Route::post('/sensor-data', [SensorDataController::class, 'store'])->name('sensor.data');

// Ejemplo de una ruta con un parámetro
Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});

// Ruta que devuelve una respuesta JSON
Route::get('/json-response', function () {
    return response()->json([
        'message' => 'Hello, world!',
        'status' => 'success'
    ]);
});
