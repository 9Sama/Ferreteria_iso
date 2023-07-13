<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\PostulanteController;
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

Route::get('/bienvenido', function () {
    return view('bienvenido');
})->name('bienvenido');

Route::get('/', function () {
    return view('index');
})->name('login');

Route::post('/',[UserController::class,'login'])->name('user.login');
Route::get('login/logout', [UserController::class, 'logout'])->name('user.logout');
Route::resource('area',AreaController::class);
Route::get('area/{id}/confirmar',[AreaController::class,'confirmar'])->name('area.confirmar');
Route::resource('postulante',PostulanteController::class);
Route::get('postulante/{id}/confirmar',[PostulanteController::class,'confirmar'])->name('postulante.confirmar');
