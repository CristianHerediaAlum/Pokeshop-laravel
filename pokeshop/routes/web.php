<?php

use App\Http\Controllers\ColeccionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComprarController;

Route::get('/', [function () {
    return view('pokeshop.index');
}]);


Route::get('/comprar', [ComprarController::class, 'index'])->name('comprar.index');
Route::post('/comprar', [ComprarController::class, 'agregarAlCarrito'])->name('comprar.agregar');
Route::get('/coleccion', [ColeccionController::class, 'index'])->name('coleccion.index');
Route::get('/coleccion/crear', [ColeccionController::class, 'crear'])->name('coleccion.crear');
Route::post('/coleccion/anadir', [ColeccionController::class, 'anadir'])->name('coleccion.anadir');