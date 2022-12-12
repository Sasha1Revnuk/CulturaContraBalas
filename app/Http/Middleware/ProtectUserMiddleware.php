<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;

class ProtectUserMiddleware
{
    public function handle($request, Closure $next)
    {
        $requestUser = $request->user;
        if($requestUser &&  auth()->user()->id === $requestUser->id) {
            abort(403);
        }

        return $next($request);
    }
}
