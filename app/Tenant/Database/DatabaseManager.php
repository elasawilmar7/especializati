<?php

namespace LogisticsGame\Tenant\Database;

use Illuminate\Support\Facades\DB;
use LogisticsGame\Models\Cliente;

class DatabaseManager
{
    public function createDatabase(Cliente $cliente)
    {
        return DB::statement("
            CREATE DATABASE {$cliente->bd_database} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
        ");
    }
}
