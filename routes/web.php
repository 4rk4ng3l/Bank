<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

