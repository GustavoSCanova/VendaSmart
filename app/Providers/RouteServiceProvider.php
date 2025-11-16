<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    public function boot(): void
    {
        parent::boot();

        $this->routes(function () {

            // Rotas padrão web.php
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Rotas Admin
            $this->mapAdminRoutes();

            // Rotas API
            Route::middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }

    /**
     * Define o grupo de rotas admin
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->as('admin.')
            ->middleware('web')
            ->group(base_path('routes/admin.php'));
    }
}
