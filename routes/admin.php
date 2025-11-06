<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

// Rotas de login do administrador (quando ainda não está autenticado)
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.submit');
});

// Rotas protegidas (somente administradores logados)
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
});
