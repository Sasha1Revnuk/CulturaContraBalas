<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;

class DirectPermissionMiddleware
{
    public function handle($request, Closure $next, ...$permissions)
    {
        foreach ($permissions as $permission) {
            if (auth()->user()->hasDirectPermission($permission)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}
