<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminShareDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        View::composer(['layouts.admin.components.*', 'admin.*'], function ($view) {
            $view->with(
                'userAdminSettings',
                auth()->user()->arrayOfAdminSettings,
            );
        });

        return $next($request);
    }
}
