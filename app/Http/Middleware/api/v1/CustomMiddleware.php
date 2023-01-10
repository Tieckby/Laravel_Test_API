<?php

namespace App\Http\Middleware\api\v1;

use Closure;
use Illuminate\Http\Request;

use App\Exceptions\api\v1\GlobalException;

class CustomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($role == "admin") {
            return $next($request);
        }
        else{
            throw new GlobalException("Access denied, you're not authorize to access this ressource ! ", 403);
        }
    }
}
