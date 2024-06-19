<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrivacidadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hola',function(){
    return "Hola mundo";
});


Route::get('presentacion',[PresentacionController::class,'index']);

Route::get('presentacion', [PresentacionController::class, 'index']);
//Route::get('login', [FormController::class, 'index']);
//Route::post('login', [FormController::class, 'store'])->name('login.store');

//RUTA PARA DASHBOARD
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta para aviso de privacidad
Route::get('/privacidad', [App\Http\Controllers\PrivacidadController::class, 'index'])->name('privacidad');

Auth::routes();



Route::group(["middleware" => "role:admin,editor,secretario"], function () {

    //RUTAS PARA DIVISION


    Route::get('/division', [DivisionController::class, 'index'])
    ->name('nueva.division');

    Route::post('/division/guardar', [DivisionController::class, 'store'])
        ->name('division.guardar');

    Route::get('/divisiones', [DivisionController::class, 'list'])
        ->name('divisiones.lista');

    Route::delete('/division/delete/{id}', [DivisionController::class, 'delete'])
        ->name('division.borrar');


    //RUTAS PARA PUESTO


    Route::get('/puesto', [PuestoController::class, 'index'])
        ->name('nuevo.puesto')
        ->middleware('auth');

    Route::post('/puesto/guardar', [PuestoController::class, 'store'])
        ->name('puesto.guardar')
        ->middleware('auth');

    Route::get('/puestos', [PuestoController::class, 'list'])
        ->name('puestos.lista');

    Route::delete('/puesto/delete/{id}', [PuestoController::class, 'delete'])
        ->name('puesto.borrar')
        ->middleware('auth');

    //RUTAS PARA PROFESOR

    Route::get('/profesor', [ProfesorController::class, 'index'])
        ->name('nuevo.profesor');

    Route::post('/profesor/guardar', [ProfesorController::class, 'store'])
        ->name('profesor.guardar');

    Route::get('/profesores', [ProfesorController::class, 'list'])
        ->name('profesores.lista');

    Route::delete('/profesor/delete/{id}', [ProfesorController::class, 'delete'])
        ->name('profesor.borrar');

    //RUTA PARA PERMISOS
    Route::get('/permisos', [PermisoController::class, 'auto'])
        ->name('permisos.lista');

    Route::get('/permisos/aceptar', [PermisoController::class, 'acep'])
        ->name('permisos.aceptar');
    
    Route::get('/permisos/rechazar', [PermisoController::class, 'rech'])
        ->name('permisos.rechazar');

});


    //RUTA PARA ENTRAR A LOS LOGS
    Route::get('/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);


    Route::get('/auth/redirect', [AuthController::class, 'redirect'])->name('auth.redirect');
     
    Route::get('/auth/callback', [AuthController::class, 'callback'])->name('auth.callback');


