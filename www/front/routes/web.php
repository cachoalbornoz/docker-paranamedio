<?php

use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('front');

Auth::routes();

// Lecturas ElectroTas
require __DIR__ . '/lecturas.php';

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Escrituras ElectroTas
    require __DIR__ . '/escrituras.php';
    // Users / Roles / Permisos
    require __DIR__ . '/roles-permisos/_routes.php';
    // Municipios
    require __DIR__ . '/municipios.php';
    // Estaciones
    require __DIR__ . '/estaciones.php';
    // Placas
    require __DIR__ . '/placas.php';
    // Tipo de Placas
    require __DIR__ . '/tipo_placa.php';

});
