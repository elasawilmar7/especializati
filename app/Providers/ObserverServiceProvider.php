<?php

namespace LogisticsGame\Providers;

use Illuminate\Support\ServiceProvider;
use LogisticsGame\Models\Simulation;
use LogisticsGame\Observers\SimulationObserver;
use LogisticsGame\Models\Student;
use LogisticsGame\Observers\StudentObserver;
use LogisticsGame\Models\StrategicPlanning;
use LogisticsGame\Observers\StrategicPlanningObserver;
use LogisticsGame\Models\DecisionCoordinator;
use LogisticsGame\Observers\DecisionCoordinatorObserver;
use LogisticsGame\Models\DecisionCompany;
use LogisticsGame\Observers\DecisionCompanyObserver;
use LogisticsGame\Models\Instituition;
use LogisticsGame\Observers\InstituitionObserver;


class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Simulation::observe(SimulationObserver::class);
        Student::observe(StudentObserver::class);
        StrategicPlanning::observe(StrategicPlanningObserver::class);
        DecisionCoordinator::observe(DecisionCoordinatorObserver::class);
        DecisionCompany::observe(DecisionCompanyObserver::class);
        Instituition::observe(InstituitionObserver::class);
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
