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

            // Detecta automaticamente se é rota de admin ou usuário comum
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }

            // Login padrão do cliente
            return route('login');
        }
    }
}
