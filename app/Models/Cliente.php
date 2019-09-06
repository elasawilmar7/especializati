<?php

namespace LogisticsGame\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'name',
        'domain',
        'bd_database',
        'bd_hostname',
        'bd_username',
        'bd_password'
    ];
}
