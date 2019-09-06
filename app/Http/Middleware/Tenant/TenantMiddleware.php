<?php

namespace LogisticsGame\Http\Middleware\Tenant;

use LogisticsGame\Models\Cliente;
use LogisticsGame\Tenant\ManagerTenant;
use Closure;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $manager = app(ManagerTenant::class);

        if ($manager->domainIsMain()) {
            return $next($request);
        }

        $cliente = $this->getCliente($request->getHost());

        // dd($cliente);

        if (!$cliente && $request->url() != route('404.tenant')) {
            return redirect()->route('404.tenant');
        } else if ($request->url() != route('404.tenant') && !$manager->domainIsMain()) {
            dd('aqui');
            $manager->setConnection($cliente);
        }
        //dd('okoko2');
        return $next($request);
    }

    public function getCliente($host)
    {
        return Cliente::where('domain', $host)->first();
    }
}
