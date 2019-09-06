<?php

namespace LogisticsGame\Tenant;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use LogisticsGame\Models\Cliente;

class ManagerTenant
{
    public function setConnection(Cliente $cliente)
    {
        DB::purge('tenant');

        config()->set('database.connections.tenant.host', $cliente->bd_hostname);
        config()->set('database.connections.tenant.database', $cliente->bd_database);
        config()->set('database.connections.tenant.username', $cliente->bd_username);
        config()->set('database.connections.tenant.password', $cliente->bd_password);

        DB::reconnect('tenant');

        Schema::connection('tenant')->getConnection()->reconnect();
    }

    public function domainIsMain()
    {
        return request()->getHost() == config('tenant.domain_main');
    }
}
