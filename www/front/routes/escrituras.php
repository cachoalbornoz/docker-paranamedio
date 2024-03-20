<?php

use App\Http\Controllers\EscriturasController;
use Illuminate\Support\Facades\Route;

//////////  ESCRITURAS
Route::get('escrituras', [EscriturasController::class, 'index'])->name('escrituras.index');
Route::get('escrituras/encender', [EscriturasController::class, 'encender'])->name('escrituras.encender');
Route::get('escrituras/apagar', [EscriturasController::class, 'apagar'])->name('escrituras.apagar');
