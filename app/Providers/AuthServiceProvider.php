<?php

namespace LogisticsGame\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use LogisticsGame\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'LogisticsGame\Model' => 'LogisticsGame\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-coordinator', function (User $user) {
            return $user->role == 'coordinator';
        });

        Gate::define('is-company', function (User $user) {
            return $user->role == 'company';
        });

        Gate::define('is-owner', function (User $user) {
            return $user->role == 'owner';
        });
    }
}
