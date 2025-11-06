<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * O caminho para onde os usuários são redirecionados após o login.
     *
     * @var string
     */
    public const HOME = '/'; // 👈 redireciona o cliente para a home pública

    protected function mapAdminRoutes()
{
    Route::prefix('admin')
        ->as('admin.')
        ->middleware('web')
        ->group(base_path('routes/admin.php'));
}

public function boot(): void
{
    parent::boot();

    $this->routes(function () {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        $this->mapAdminRoutes();
    });
}

}