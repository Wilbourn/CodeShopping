<?php

namespace CodeShopping\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->is('api/*')){
            header('Access-Control-Allow-Origin: * ');
            header('Access-Control-Allow-Headers: Content-Type,Authorization');
        }
        return $next($request);
    }
}
