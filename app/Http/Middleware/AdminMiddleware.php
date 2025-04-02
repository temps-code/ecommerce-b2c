<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica que el usuario esté autenticado y tenga el rol 'admin'
        if (! $request->user() || $request->user()->role !== 'admin') {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
