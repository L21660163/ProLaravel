<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('login');
});

Route::get('/alumno', function () {
    return view('alumnodashboard');
});

require __DIR__.'/auth.php';
