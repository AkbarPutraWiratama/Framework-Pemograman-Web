<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!in_array($request->user()->role, $roles)) {
            abort(403); // atau redirect
        }
        return $next($request);
    }
}