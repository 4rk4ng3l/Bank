<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TransferenciaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Ruta de inicio
Route::get('/', function () {
    return view('inicio');
})->middleware('auth');

Route::get('/inicio', function(){
    return view('inicio');
});
//Control de sesion
Route::get('/login', [SessionsController::class,'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');

//Registro de usuarios
Route::get('/register', [RegisterController::class,'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

// Ruta cuentas controller
Route::resource('cuenta','App\Http\Controllers\CuentaController')
    ->middleware('auth');

// Rutas Movimientos de cuentas
Route::get('/transferenciaPropia', function(){
    return view('Tranferencias.cuentasPropias');
});
Route::get('/transferenciaTerceros', function(){
    return view('Tranferencias.cuentasTerceros');
});

Route::get('transferencias_propias', ['App\Http\Controllers\TransferenciaController', 'propias'])
    ->middleware('auth')
    ->name('transferencia.propia');

Route::get('transferencias_terceros', ['App\Http\Controllers\TransferenciaController', 'terceros'])
    ->middleware('auth')
    ->name('transferencia.terceros');

Route::post('transferencia_guardar_propia', [TransferenciaController::class, 'guardarPropia'])
    ->middleware('auth')
    ->name('transferencia.guardarPropia');

Route::post('transferencia_guardar_tercero', [TransferenciaController::class, 'guardarTerceros'])
->middleware('auth')
->name('transferencia.guardarTerceros');

Route::get('transferencias_listado', ['App\Http\Controllers\TransferenciaController', 'index'])
    ->middleware('auth')
    ->name('transferencia.listado');


