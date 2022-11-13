<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (!auth()->check() || !auth()->user()->hasRole($role)) {
            abort(404);
        }
        if ($permission !== null && !auth()->user()->can($permission)) {
            abort(404);
        }
        return $next($request);
    }
    // In this middleware, we are checking if the current user doesn’t have the role/permission specified, then return the 404 error page. There are so many possibilities to use roles and permissions in middleware to control the incoming requests, it all depends on your application’s requirements.
}
