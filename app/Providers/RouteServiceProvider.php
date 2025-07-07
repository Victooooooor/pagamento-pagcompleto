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
     * Caminho para a rota "home" após o login.
     */
    public const HOME = '/home';

    /**
     * Inicializa o provedor de rotas.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Carrega as rotas da API
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Carrega as rotas web
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Define o rate limiting da API.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
