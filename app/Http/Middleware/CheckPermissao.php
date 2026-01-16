<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissao
{
    public function handle(Request $request, Closure $next, string $permissao): Response
    {
        $user = auth()->user();

        if (! $user) {
            abort(403);
        }

        if ($user->isAdminGlobal()) {
            return $next($request);
        }

        if (! $user->hasPermissao($permissao)) {
            abort(403, 'Você não tem permissão para acessar esta funcionalidade.');
        }

        return $next($request);
    }
}
