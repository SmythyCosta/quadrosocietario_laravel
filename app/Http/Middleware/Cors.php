<?php

namespace App\Http\Middleware;

use Closure;
/*
 * CORS middleware not getting executed
 * 
 * XMLHttpRequest cannot load xxxx.
 * Response to the preflight request doesn't pass access control check: 
 * No 'Access-Control-Allow-Origin' header is present on the requested resource.
 * Origin 'http://localhost' is therefore not allowed access.
 *
 * https://github.com/laravel/framework/issues/13643
*/

class Cors
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
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, Application');
        return $next($request);
    }
}