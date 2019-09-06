<?php

namespace LogisticsGame\Console\Commands\Tenant;

use Illuminate\Console\Command;
use LogisticsGame\Tenant\ManagerTenant;
use Illuminate\Support\Facades\Artisan;
use LogisticsGame\Models\Cliente;

class TenantMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrations {id?} {--refresh}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Carrega Migrations Central';
    private $tenant;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ManagerTenant $tenant)
    {
        parent::__construct();
        $this->tenant = $tenant;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        if ($id = $this->argument('id')) {
            $cli = Cliente::find($id);

            if ($cli) {
                //dd($id);
                $this->execCommand($cli);
            }
            return;
        }

        $clientes = Cliente::all();

        foreach ($clientes as $cli) {
            $this->execCommand($cli);
        }
    }

    public function CentralHandle()
    {
        $command = $this->option('refresh') ? 'migrate:refresh' : 'migrate';
        $this->info("Gerando tabelas - Central");
        Artisan::call($command, [
            '--force' => true,
            '--path' => '/database/migrations/tenant',
        ]);
        $this->info("Tabelas - Central - geradas");
    }
    public function execCommand(Cliente $cli)
    {
        $command = $this->option('refresh') ? 'migrate:refresh' : 'migrate';

        $this->tenant->setConnection($cli);
        $this->info("Gerando tabelas - Cliente {$cli->name} ");
        Artisan::call($command, [
            '--force' => true,
            '--path' => '/database/migrations',
        ]);
        $this->info("Tabelas - Cliente {$cli->name} geradas");
        $this->info("--------------------------------------");
    }
}
