<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // CRUD completo de solicitudes
    Route::resource('collection_requests', CollectionRequestController::class);

    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta de reportes
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
});

// Rutas de autenticación
require __DIR__ . '/auth.php';
