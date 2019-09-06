<?php

namespace LogisticsGame\Http\Middleware;

use Closure;

class Coordinator
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
        if (auth()->user()->role == 'coordinator') {
            return $next($request);
        }

        if (auth()->user()->role == 'company') {
            return redirect()->route('company');
        }

        if (auth()->user()->role == 'owner') {
            return redirect()->route('owner');
        }

        return redirect()->route('admin');
    }
}
