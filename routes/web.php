<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VentaController;

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
Route::resource('puesto',PuestoController::class);
Route::get('puesto/{id}/confirmar',[PuestoController::class,'confirmar'])->name('puesto.confirmar');
Route::resource('plaza',PlazaController::class);
Route::get('plaza/{id}/confirmar',[PlazaController::class,'confirmar'])->name('plaza.confirmar');
Route::resource('personal',PersonalController::class);
Route::get('personal/{id}/confirmar',[PersonalController::class,'confirmar'])->name('personal.confirmar');
Route::get('personal/{id}/create2',[PersonalController::class,'create2'])->name('personal.create2');

// Proveedor
Route::get('personas/proveedor', [ProveedorController::class, 'index'])->name('proveedores.index');
Route::post('personas/proveedor', [ProveedorController::class, 'store'])->name('proveedores.store');
Route::put('personas/proveedor/{id}', [ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('personas/proveedor/{id}', [ProveedorController::class, 'destroy'])->name('proveedores.delete');

// Cliente
Route::get('personas/cliente', [CustomerController::class, 'index'])->name('clientes.index');
Route::post('personas/cliente', [CustomerController::class, 'store'])->name('clientes.store');
Route::put('personas/cliente/{id}', [CustomerController::class, 'update'])->name('clientes.update');
Route::delete('personas/cliente/{id}', [CustomerController::class, 'destroy'])->name('clientes.delete');

// Compras
Route::get('compras', [CompraController::class, 'index'])->name('compras.index');
Route::get('compras/registrar', [CompraController::class, 'create'])->name('compras.create');
Route::post('compras/guardar', [CompraController::class, 'store'])->name('compras.store');
Route::get('compras/mostrar/{id}', [CompraController::class, 'show'])->name('compras.show');
Route::put('compras/aprobar/{id}', [CompraController::class, 'approve'])->name('compras.approve');
Route::put('compras/rechazar/{id}', [CompraController::class, 'reject'])->name('compras.reject');

// Ventas
Route::get('ventas', [VentaController::class, 'index'])->name('ventas.index');
Route::get('ventas/registrar', [VentaController::class, 'create'])->name('ventas.create');
Route::post('ventas/guardar', [VentaController::class, 'store'])->name('ventas.store');
Route::get('ventas/mostrar/{id}', [VentaController::class, 'show'])->name('ventas.show');
Route::put('ventas/aprobar/{id}', [VentaController::class, 'approve'])->name('ventas.approve');
Route::put('ventas/rechazar/{id}', [VentaController::class, 'reject'])->name('ventas.reject');

// Products
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.delete');

// Almacen
Route::get('almacen', [AlmacenController::class, 'index'])->name('almacen.index');
Route::get('almacen/products', [AlmacenController::class, 'getAllProducts'])->name('almacen.products.index');
Route::post('almacen/products', [AlmacenController::class, 'store'])->name('almacen.products.store');
Route::post('almacen/categories', [AlmacenController::class, 'addCategory'])->name('almacen.categories.store');
Route::put('almacen/products/{id}', [AlmacenController::class, 'update'])->name('almacen.products.update');
Route::delete('almacen/products/{id}', [AlmacenController::class, 'destroy'])->name('almacen.products.delete');
Route::get('almacen/products/show/{id}', [AlmacenController::class, 'show'])->name('almacen.show');
Route::put('almacen/registrar/{id}', [AlmacenController::class, 'register'])->name('almacen.register');
Route::put('almacen/products/change/{id}/{compra_id}', [AlmacenController::class, 'changeState'])->name('almacen.change');
