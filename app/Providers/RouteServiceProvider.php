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
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));


            // ESTE VA SER PARA CUANDO ESTE CLARO LO DE LA AUTENTICACION EN EL SISTEMA OJO
            /* Route::middleware('web','auth')
                ->prefix('admin')   julio esto indica si quieres utilizar un prefijo para 
                separar por capas al sistema ve este video https://www.youtube.com/watch?v=r8RKayPtijc minuto 4:00
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php')); */

            // POR AHORA UTILIZA ESTE REVISA QUE LO ESTA TOMANDO SIN EL MIDDLEWARE AUTH
            // QUE SE ENCARGARIA DE REALIZAR ESTO
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

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
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
