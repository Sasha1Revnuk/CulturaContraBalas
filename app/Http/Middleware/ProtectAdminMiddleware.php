<?php

namespace App\Http\Middleware;

use App\Enumerators\Admin\RolesEnumerator;
use Closure;

class ProtectAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $requestUser = $request->user;
        if ($requestUser && $requestUser->hasRole(RolesEnumerator::ROLE_SUPER_ADMINISTRATOR)) {
            abort(403);
        }
        
        return $next($request);
    }
}
