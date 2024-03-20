<?php

use App\Http\Controllers\LecturasController;
use Illuminate\Support\Facades\Route;

//////////  LECTURAS
Route::get('lecturas', [LecturasController::class, 'index'])->name('lecturas.index');
Route::get('lecturas/iniciar', [LecturasController::class, 'iniciarLecturas'])->name('lecturas.iniciar');
Route::get('lecturas/detener', [LecturasController::class, 'detenerLecturas'])->name('lecturas.detener');
Route::get('lecturas/render', [LecturasController::class, 'renderLecturas'])->name('lecturas.render');
