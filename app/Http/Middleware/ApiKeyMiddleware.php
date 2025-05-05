<?php

namespace App\Http\Middleware;

use Closure;

class ApiKeyMiddleware
{
    public function handle($request, Closure $next)
    {
        $apiKey = $request->header('x-api-key') ?? $request->query('api_key');

        if ($apiKey !== '12345') {
            return response()->json(['error' => 'API key tidak valid'], 401);
        }

        return $next($request);
    }
}
