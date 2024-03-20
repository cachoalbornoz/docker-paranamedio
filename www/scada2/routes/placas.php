<?php

use App\Http\Controllers\PlacaController;
use Illuminate\Support\Facades\Route;


//////////  PLACAS
Route::get('placas', [PlacaController::class, 'index'])->name('placas.index');
Route::get('placas/getplacas', [PlacaController::class, 'getPlacas'])->name('placas.getplacas');
Route::get('placas/create', [PlacaController::class, 'create'])->name('placas.create');
Route::post('placas/store', [PlacaController::class, 'store'])->name('placas.store');
Route::get('placas/edit/{placa}', [PlacaController::class, 'edit'])->name('placas.edit');
Route::put('placas/{placa}', [PlacaController::class, 'update'])->name('placas.update');
Route::post('placas/destroy', [PlacaController::class, 'destroy'])->name('placas.destroy');
