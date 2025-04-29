<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComprarController;

Route::get('/', [function () {
    return view('pokeshop.index');
}]);


Route::get('/comprar', [ComprarController::class, 'index'])->name('comprar.index');
Route::post('/comprar', [ComprarController::class, 'agregarAlCarrito'])->name('comprar.agregar');