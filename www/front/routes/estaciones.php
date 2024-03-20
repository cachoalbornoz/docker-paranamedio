<?php

use App\Http\Controllers\EstacionController;
use Illuminate\Support\Facades\Route;


//////////  ESTACIONES
Route::get('estaciones', [EstacionController::class, 'index'])->name('estaciones.index');
Route::get('estaciones/getestaciones', [EstacionController::class, 'getEstaciones'])->name('estaciones.getestaciones');
Route::get('estaciones/create', [EstacionController::class, 'create'])->name('estaciones.create');
Route::post('estaciones/store', [EstacionController::class, 'store'])->name('estaciones.store');
Route::get('estaciones/edit/{estacion}', [EstacionController::class, 'edit'])->name('estaciones.edit');
Route::put('estaciones/{estacion}', [EstacionController::class, 'update'])->name('estaciones.update');
Route::post('estaciones/destroy', [EstacionController::class, 'destroy'])->name('estaciones.destroy');
