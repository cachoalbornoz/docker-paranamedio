<?php

use App\Http\Controllers\TipoPlacaController;
use Illuminate\Support\Facades\Route;


//////////  PLACAS
Route::get('tipo-placas', [TipoPlacaController::class, 'index'])->name('tipoplaca.index');
Route::get('tipo-placas/gettipo-placas', [TipoPlacaController::class, 'getTipoPlacas'])->name('tipoplaca.getTipoPlaca');
Route::get('tipo-placas/create', [TipoPlacaController::class, 'create'])->name('tipoplaca.create');
Route::post('tipo-placas/store', [TipoPlacaController::class, 'store'])->name('tipoplaca.store');
Route::get('tipo-placas/edit/{tipoplaca}', [TipoPlacaController::class, 'edit'])->name('tipoplaca.edit');
Route::put('tipo-placas/{tipoplaca}', [TipoPlacaController::class, 'update'])->name('tipoplaca.update');
Route::post('tipo-placas/destroy', [TipoPlacaController::class, 'destroy'])->name('tipoplaca.destroy');
