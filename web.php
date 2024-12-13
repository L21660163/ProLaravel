<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});

// Ruta del dashboard (requiere autenticación y verificación)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas del perfil del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta a la intranet
Route::get('/intranet', function () {
    return redirect()->away('https://matehuala.tecnm.mx/intranet/');
})->name('intranet');

// Rutas de coordinadores
Route::get('/coordinador/copu', function () {
    return view('Coordinador-copu'); // Renderiza la vista 'Coordinador-copu.blade.php'
});

Route::get('/coordinador/iciv', function () {
    return view('Coordinador-iciv'); // Renderiza la vista 'Coordinador-iciv.blade.php'
});

Route::get('/coordinador/igem', function () {
    return view('Coordinador-igem'); // Renderiza la vista 'Coordinador-igem.blade.php'
});

Route::get('/coordinador/isic', function () {
    return view('Coordinador-isic'); // Renderiza la vista 'Coordinador-isic.blade.php'
});

Route::get('/coordinador/iind', function () {
    return view('Coordinador-iind'); // Renderiza la vista 'Coordinador-iind.blade.php'
});


// Rutas de autenticación
require __DIR__.'/auth.php';
