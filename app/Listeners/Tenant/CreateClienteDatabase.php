<?php

namespace LogisticsGame\Listeners\Tenant;

use LogisticsGame\Tenant\Database\DatabaseManager;
use LogisticsGame\Events\Tenant\ClienteCreated;
use LogisticsGame\Events\Tenant\DatabaseCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateClienteDatabase
{
    private $database;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(DatabaseManager $database)
    {
        $this->database = $database;
    }

    /**
     * Handle the event.
     *
     * @param  ClienteCreated  $event
     * @return void
     */
    public function handle(ClienteCreated $event)
    {
        $cliente = $event->cliente();
        if (!$this->database->createDatabase($cliente)) {
            throw new \Exception('Erro ao criar o Banco de dados');
        }

        event(new DatabaseCreated($cliente));
    }
}
