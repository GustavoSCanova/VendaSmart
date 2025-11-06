<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Redireciona o usuário se ele não estiver autenticado.
     */
   protected function redirectTo($request)
{
    if (! $request->expectsJson()) {
        if ($request->is('admin/*')) {
            return route('admin.login');
        }

        return route('login');
    }
}
}