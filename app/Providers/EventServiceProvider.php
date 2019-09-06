<?php

namespace LogisticsGame\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'LogisticsGame\Events\Tenant\ClienteCreated' => [
            'LogisticsGame\Listeners\Tenant\CreateClienteDatabase',
        ],
        'LogisticsGame\Events\Tenant\DatabaseCreated' => [
            'LogisticsGame\Listeners\Tenant\RunMigrationsTenant',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
