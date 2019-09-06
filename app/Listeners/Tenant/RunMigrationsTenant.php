<?php

namespace LogisticsGame\Listeners\Tenant;

use LogisticsGame\Events\Tenant\DatabaseCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Artisan;

class RunMigrationsTenant
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DatabaseCreated  $event
     * @return void
     */
    public function handle(DatabaseCreated $event)
    {
        $cliente = $event->cliente();

        $migration = Artisan::call('tenants:migrations', [
            'id' => $cliente->id,
        ]);

        return $migration === 0;
    }
}
