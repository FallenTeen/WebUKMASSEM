<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CachePage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
      //BY URL
        $cacheKey = 'page_cache_' . md5($request->url());
        if (Cache::has($cacheKey)) {
            return response(Cache::get($cacheKey), 200, [
                'X-Cache' => 'HIT'
            ]);
        }

        //CACHING GAMbarsss dan kawan kawannya
        if (preg_match('/\.(jpg|jpeg|png|webp|svg)$/i', $request->path())) {
            $response = $next($request);
            $response->headers->set('Cache-Control', 'public, max-age=300, immutable');
            return $response;
        }

        $response = $next($request);

        // Caching 5 menits (Ngirit server woila)
        Cache::put($cacheKey, $response->getContent(), 5);

        return $response;
    }
}
