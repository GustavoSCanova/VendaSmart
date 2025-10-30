<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Todas as rotas administrativas, protegidas pelo guard "admin".
| Prefixo: /admin
| Nome: admin.*
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Autenticação do Admin
    |--------------------------------------------------------------------------
    */

    // Mostrar formulário de login (somente se não estiver logado)
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])
        ->middleware('guest:admin')
        ->name('login');

    // Submeter formulário de login
    Route::post('login', [AdminAuthController::class, 'login'])
        ->middleware('guest:admin')
        ->name('login.post');

    // Logout (somente admins autenticados)
    Route::post('logout', [AdminAuthController::class, 'logout'])
        ->middleware('auth:admin')
        ->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Rotas protegidas (somente admins logados)
    |--------------------------------------------------------------------------
    */
    Route::middleware('auth:admin')->group(function () {

        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // CRUD de produtos
        Route::middleware('auth:admin')->group(function () {
            Route::resource('products', AdminProductController::class)->names([
                'index'   => 'products.index',
                'create'  => 'products.create',
                'store'   => 'products.store',
                'show'    => 'products.show',
                'edit'    => 'products.edit',
                'update'  => 'products.update',
                'destroy' => 'products.destroy',
            ]);
        });
    });
});
