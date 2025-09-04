<?php

use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return redirect()->route('estudiantes.index');
});

// Rutas resource para el CRUD
Route::resource('estudiantes', EstudianteController::class);