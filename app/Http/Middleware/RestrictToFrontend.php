<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictToFrontend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Daftar origin yang diperbolehkan
        $allowedOrigins = ['*'];

        // Dapatkan header 'Origin'
        $origin = $request->headers->get('origin');

        // Jika origin tidak diizinkan, tolak akses
        if (!in_array($origin, $allowedOrigins)) {
            return response()->json(['message' => 'Unauthorized. Who are you? :p'], 403);
        }

        return $next($request);
    }
}
