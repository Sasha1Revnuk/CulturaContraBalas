<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/cabinet';

    protected $adminNamespace = 'App\Http\Controllers\Admin';
    protected $frontNamespace = 'App\Http\Controllers\Web';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix(\App\Http\Middleware\Locale::getLocale() . '/admin-menu')
                ->middleware( 'web')
                ->namespace($this->adminNamespace)
                ->group(base_path('routes/admin.php'));

            Route::prefix(\App\Http\Middleware\Locale::getLocale() . '/admin-menu/api')
                ->middleware(['web', 'adminApi'])
                ->namespace($this->adminNamespace)
                ->group(base_path('routes/admin_api.php'));

            Route::prefix(\App\Http\Middleware\Locale::getLocale() . '/api')
                ->middleware('api')
                ->namespace($this->frontNamespace)
                ->group(base_path('routes/api.php'));

            Route::prefix(\App\Http\Middleware\Locale::getLocale() . '/')
                ->middleware('web')
                ->namespace($this->frontNamespace)
                ->group(base_path('routes/web.php'));

        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('adminApi', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
