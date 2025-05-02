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
Route::post('/coleccion', [ColeccionController::class, 'añadir'])->name('coleccion.añadir');