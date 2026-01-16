<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            app()->instance('empresa_id', auth()->user()->empresa_id);
        }

        return $next($request);
    }
}
