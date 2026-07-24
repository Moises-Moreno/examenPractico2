<?php

use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/vehiculos');

Route::resource('vehiculos', VehiculoController::class);
