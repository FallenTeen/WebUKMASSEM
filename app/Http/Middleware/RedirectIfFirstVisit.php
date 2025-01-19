<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfFirstVisit
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('visited')) {
            // SESSION VISITED CHEEEEECKKKK
            $request->session()->put('visited', true);
            return redirect()->route('splash');
        }

        return $next($request);
    }
}

