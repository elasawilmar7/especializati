<?php

namespace LogisticsGame\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use LogisticsGame\Events\Tenant\ClienteCreated;
use LogisticsGame\Events\Tenant\DatabaseCreated;
use LogisticsGame\Http\Controllers\Controller;
use LogisticsGame\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = $this->cliente->create(
            [
                'name' => 'Empresa x ' . str_random(5),
                'domain' => str_random(5) . 'minhaempresa.com',
                'bd_database' => 'multi_tenant' . str_random(5),
                'bd_hostname' => '127.0.0.1',
                'bd_username' => 'root',
                'bd_password' => ''
            ]
        );
        if (true) { // cria banco e tabelas
            event(new ClienteCreated($cliente));
        } else { //cria somente as tabelas
            event(new DatabaseCreated($cliente));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
