<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ComprarController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ColeccionController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;

// Ruta raíz que redirige a login o a la vista correspondiente según el tipo de usuario
Route::get('/', function () {
    if (!Session::has('usuario')) {
        return redirect()->route('login');
    }

    // Si es admin, mostrar index-admin (ajusta el nombre si usas otro)
    if (Session::get('Es_admin') == 1) {
        return view('pokeshop.index-admin');
    }

    // Si no es admin, mostrar index normal
    return view('pokeshop.index');
})->name('inicio');

// Rutas de compra
Route::get('/comprar', [ComprarController::class, 'index'])->name('comprar.index');
Route::post('/comprar', [ComprarController::class, 'agregarAlCarrito'])->name('comprar.agregar');

// Rutas de colección
Route::get('/coleccion', [ColeccionController::class, 'index'])->name('coleccion.index');
Route::get('/coleccion/crear', [ColeccionController::class, 'crear'])->name('coleccion.crear');
Route::post('/coleccion/anadir', [ColeccionController::class, 'anadir'])->name('coleccion.anadir');
// Mostrar formulario de edición
Route::get('/coleccion/editar/{id}', [ColeccionController::class, 'editar'])->name('coleccion.editar');
// Guardar los cambios
Route::post('/coleccion/actualizar/{id}', [ColeccionController::class, 'actualizar'])->name('coleccion.actualizar');

//Rutas de carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/comprar', [CarritoController::class, 'comprar'])->name('carrito.comprar');
Route::post('/carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Cierre de sesión
Route::get('/logout', function () {
    Session::flush(); // Elimina toda la sesión
    return redirect()->route('login');
})->name('logout');
