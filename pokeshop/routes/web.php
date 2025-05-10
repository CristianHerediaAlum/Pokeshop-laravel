<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Models\Usuario;


use App\Http\Controllers\ComprarController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ColeccionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PerfilAdminController;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\UsuarioController;

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

// Rutas de carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/comprar', [CarritoController::class, 'comprar'])->name('carrito.comprar');
Route::post('/carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

// Rutas de ventas
Route::get('/vender', [VenderController::class, 'index'])->name('vender.index');
Route::post('/vender/toggle', [VenderController::class, 'toggleVenta'])->name('vender.toggle');

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Cierre de sesión
Route::get('/logout', function () {
    Session::flush(); // Elimina toda la sesión
    return redirect()->route('login');
})->name('logout');

//Rutas de perfil USUARIO
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
// Editar nombre, apellidos, correo, nickname
Route::get('/perfil/editar', [PerfilController::class, 'editar'])->name('perfil.editar-perfil');
Route::post('/perfil/editar-dato', [PerfilController::class, 'editarDato'])->name('perfil.editar-dato');


// Ingresar saldo
Route::get('/perfil/ingresar-saldo', [PerfilController::class, 'ingresarSaldo'])->name('perfil.ingresar-saldo');
Route::post('/perfil/confirmar-saldo', [PerfilController::class, 'confirmarSaldo'])->name('perfil.confirmar-saldo');


// Cambiar contraseña
Route::get('/perfil/cambiar-contrasena', [PerfilController::class, 'cambiarContrasena'])->name('perfil.cambiar-contrasena');
Route::post('/perfil/confirmar-contrasena', [PerfilController::class, 'confirmarContrasena'])->name('perfil.confirmar-contrasena');


//Rutas de perfil ADMINISTRADOR
Route::get('/perfil-admin', [PerfilAdminController::class, 'index'])->name('perfil-admin.index');
// Editar nombre, apellidos, correo, nickname
Route::get('/perfil-admin/editar', [PerfilAdminController::class, 'editar'])->name('perfil-admin.editar-perfil');
Route::post('/perfil-admin/editar-dato', [PerfilAdminController::class, 'editarDato'])->name('perfil-admin.editar-dato');

// Cambiar contraseña
Route::get('/perfil-admin/cambiar-contrasena', [PerfilAdminController::class, 'cambiarContrasena'])->name('perfil-admin.cambiar-contrasena');
Route::post('/perfil-admin/confirmar-contrasena', [PerfilAdminController::class, 'confirmarContrasena'])->name('perfil-admin.confirmar-contrasena');


//Gestion de cartas
Route::get('/gestion-cartas', [CartaController::class, 'index'])->name('gestion-cartas.index');
// Ruta para editar una carta
Route::get('/editar-carta/{id}', [CartaController::class, 'editar'])->name('gestion-cartas.editar');
// Ruta para guardar los cambios de una carta
Route::post('/guardar-cambios-en-cartas', [CartaController::class, 'guardarCambios'])->name('guardar-cambios-en-cartas');

// Ruta para eliminar una carta
Route::post('/eliminar-carta', [CartaController::class, 'eliminar'])->name('gestion-cartas.eliminar');


//Gestion de usuarios
Route::get('/gestion-usuarios', [UsuarioController::class, 'index'])->name('gestion-usuarios.index');
Route::post('/gestion-usuarios/eliminar', [UsuarioController::class, 'eliminar'])->name('usuarios.eliminar');
Route::post('/gestion-usuarios/editar', [UsuarioController::class, 'editar'])->name('gestion-usuarios.editar');
Route::get('/editar-usuario', function () {
    $id = session('editar-usuarios');

    if (!$id) {
        return redirect()->route('gestion-usuarios.index');
    }

    $usuario = Usuario::where('ID_Usuario', $id)->first();

    return view('gestion-usuarios.editar', compact('usuario'));
})->name('editar.usuario');
Route::post('/guardar-cambios', [UsuarioController::class, 'guardarCambios'])->name('guardar-cambios');

//Email de confirmacion
Route::get('/verify/{code}', [AuthController::class, 'verifyEmail']);


