<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\PuestoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;

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
    return view('index');
});
Route::post('/',[UserController::class,'login'])->name('user.login');
Route::resource('area',AreaController::class);
Route::get('area/{id}/confirmar',[AreaController::class,'confirmar'])->name('area.confirmar');
Route::resource('postulante',PostulanteController::class);
Route::get('postulante/{id}/confirmar',[PostulanteController::class,'confirmar'])->name('postulante.confirmar');
Route::resource('puesto',PuestoController::class);
Route::get('puesto/{id}/confirmar',[PuestoController::class,'confirmar'])->name('puesto.confirmar');
Route::resource('plaza',PlazaController::class);
Route::get('plaza/{id}/confirmar',[PlazaController::class,'confirmar'])->name('plaza.confirmar');
Route::resource('personal',PersonalController::class);
Route::get('personal/{id}/confirmar',[PersonalController::class,'confirmar'])->name('personal.confirmar');
Route::get('personal/{id}/create2',[PersonalController::class,'create2'])->name('personal.create2');


