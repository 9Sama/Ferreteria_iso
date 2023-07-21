<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\UserController;

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

// Proveedor
Route::get('personas/proveedor', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::post('personas/proveedor', [ProveedorController::class, 'store'])->name('proveedores.store');
Route::put('personas/proveedor/{id}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('personas/proveedor/{id}', [ProveedorController::class, 'destroy'])->name('proveedores.delete');

// Compras
Route::get('compras', [CompraController::class, 'index'])->name('compras.index');
Route::get('compras/registrar', [CompraController::class, 'create'])->name('compras.create');
Route::post('compras/guardar', [CompraController::class, 'store'])->name('compras.store');
Route::get('compras/mostrar/{id}', [CompraController::class, 'show'])->name('compras.show');
Route::put('compras/aprobar/{id}', [CompraController::class, 'approve'])->name('compras.approve');
Route::put('compras/rechazar/{id}', [CompraController::class, 'reject'])->name('compras.reject');

