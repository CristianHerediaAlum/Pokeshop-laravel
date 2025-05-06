<?php

use App\Http\Controllers\ColeccionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComprarController;
use App\Http\Controllers\CarritoController;


Route::get('/', [function () {
    return view('pokeshop.index');
}]);


Route::get('/comprar', [ComprarController::class, 'index'])->name('comprar.index');
Route::post('/comprar', [ComprarController::class, 'agregarAlCarrito'])->name('comprar.agregar');
Route::get('/coleccion', [ColeccionController::class, 'index'])->name('coleccion.index');
Route::get('/coleccion/crear', [ColeccionController::class, 'crear'])->name('coleccion.crear');
Route::post('/coleccion/anadir', [ColeccionController::class, 'anadir'])->name('coleccion.anadir');
// Mostrar formulario de edición
Route::get('/coleccion/editar/{id}', [ColeccionController::class, 'editar'])->name('coleccion.editar');
// Guardar los cambios
Route::post('/coleccion/actualizar/{id}', [ColeccionController::class, 'actualizar'])->name('coleccion.actualizar');


Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/comprar', [CarritoController::class, 'comprar'])->name('carrito.comprar');
Route::post('/carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');