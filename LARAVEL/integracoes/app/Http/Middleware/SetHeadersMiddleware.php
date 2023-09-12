<?php

namespace App\Http\Middleware;

use Closure;

class SetHeadersMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Defina os cabeçalhos HTTP no objeto de resposta
        $response->header('Cache-Control', 'public, max-age=3600');
        $response->header('Content-Type', 'application/json; charset=UTF-8');

        return $response;
    }
}
