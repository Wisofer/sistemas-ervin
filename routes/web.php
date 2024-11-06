<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController; // Importar el controlador correcto
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create'); // Definir la ruta para crear usuarios
    Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store'); // Definir la ruta para almacenar un nuevo usuario
    Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show'); // Definir la ruta para mostrar un usuario
    Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit'); // Definir la ruta para editar un usuario
    Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update'); // Definir la ruta para actualizar un usuario
    Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy'); // Definir la ruta para eliminar un usuario
});

require __DIR__.'/auth.php';
