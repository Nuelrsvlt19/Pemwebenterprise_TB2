<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika pengguna sudah login, izinkan akses
        if (Auth::check()) {
            return $next($request);
        }

        // Jika pengguna belum login, berikan respon akses ditolak
        return response()->json([
            'error' => 'Anda tidak memiliki izin untuk mengakses halaman ini'
        ], 403);
    }
}
