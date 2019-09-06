<?php

namespace LogisticsGame\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'LogisticsGame\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapCompanyRoutes();

        $this->mapCoordinatorRoutes();

        $this->mapTenantRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
    /**
     * Define the "Tenant" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapTenantRoutes()
    {
        Route::prefix('tenants')
            ->middleware('web', 'check.domain.main')
            ->namespace($this->namespace)
            ->group(base_path('routes/tenant.php'));
    }
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    public function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }

    public function mapCompanyRoutes()
    {
        Route::prefix('')
            ->middleware(['web', 'auth', 'company'])
            ->namespace($this->namespace)
            ->group(base_path('routes/company.php'));
    }

    public function mapCoordinatorRoutes()
    {
        Route::prefix('coordinator')
            ->middleware(['web', 'auth', 'coordinator'])
            ->namespace($this->namespace)
            ->group(base_path('routes/coordinator.php'));
    }
}
