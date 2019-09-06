<?php

namespace LogisticsGame\Http\Middleware\Tenant;

use Closure;

class CheckDomainMain
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
        if (request()->getHost() != config('tenant.domain_main')) {
            abort(401);
        }
        //dd(request()->getHost());
        return $next($request);
    }
}
