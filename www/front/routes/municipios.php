<?php

use App\Http\Controllers\MunicipioController;
use Illuminate\Support\Facades\Route;


//////////  MUNICIPIOS
Route::get('municipios', [MunicipioController::class, 'index'])->name('municipios.index');
Route::get('municipios/getmunicipios', [MunicipioController::class, 'getMunicipios'])->name('municipios.getmunicipios');
Route::get('municipios/create', [MunicipioController::class, 'create'])->name('municipios.create');
Route::post('municipios/store', [MunicipioController::class, 'store'])->name('municipios.store');
Route::get('municipios/edit/{municipio}', [MunicipioController::class, 'edit'])->name('municipios.edit');
Route::put('municipios/{municipio}', [MunicipioController::class, 'update'])->name('municipios.update');
Route::post('municipios/destroy', [MunicipioController::class, 'destroy'])->name('municipios.destroy');
