<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Cek apakah pengguna sudah login
        if (Auth::guard($guard)->check()) {
            // Jika sudah login, arahkan ke dashboard
            return redirect()->route('dashboard');
        }

        // Jika belum login, lanjutkan ke halaman login
        return $next($request);
    }
}
