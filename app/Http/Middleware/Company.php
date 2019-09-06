<?php

namespace LogisticsGame\Http\Middleware;

use Closure;

class Company
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
        if (auth()->user()->role == 'company') {
            return $next($request);
        }

        if (auth()->user()->role == 'coordinator') {
            return redirect()->route('simulation.index');
        }

        if (auth()->user()->role == 'owner') {
            return redirect()->route('owner');
        }
        
        return redirect()->route('admin');

    }
}
