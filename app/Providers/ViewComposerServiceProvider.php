<?php

namespace LogisticsGame\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $request = app(\Illuminate\Http\Request::class);
        // dd(getenv('PAG_404'));
        if ($request->url() != getenv('PAG_404')) {
            View::composer(
                '*',
                'LogisticsGame\ViewComposers\InstituitionViewComposer'
            );
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
