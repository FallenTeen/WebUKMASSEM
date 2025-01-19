<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckVerifiedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek jika pengguna sudah login dan status verifikasi pengguna adalah 0
        if (Auth::check() && !Auth::user()->verified_user) {
            Auth::logout();  // Log out pengguna yang tidak terverifikasi
            return redirect()->route('login')->withErrors([
                'email' => trans('auth.unverified'),
            ]);
        }

        return $next($request);
    }
}
