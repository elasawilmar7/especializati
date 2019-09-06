<?php

namespace LogisticsGame\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\LogisticsGame\Contracts\SimulationRepository::class, \LogisticsGame\Repositories\SimulationRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\UserRepository::class, \LogisticsGame\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\TurnRepository::class, \LogisticsGame\Repositories\TurnRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\StudentRepository::class, \LogisticsGame\Repositories\StudentRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\InstituitionRepository::class, \LogisticsGame\Repositories\InstituitionRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\StrategicPlanningRepository::class, \LogisticsGame\Repositories\StrategicPlanningRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\DecisionCoordinatorRepository::class, \LogisticsGame\Repositories\DecisionCoordinatorRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\OccupationRepository::class, \LogisticsGame\Repositories\OccupationRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\ThemeRepository::class, \LogisticsGame\Repositories\ThemeRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\MatterRepository::class, \LogisticsGame\Repositories\MatterRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\NewspaperRepository::class, \LogisticsGame\Repositories\NewspaperRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\DecisionCompanyRepository::class, \LogisticsGame\Repositories\DecisionCompanyRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\RankingRepository::class, \LogisticsGame\Repositories\RankingRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\MachineRepository::class, \LogisticsGame\Repositories\MachineRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\LimitLoanRepository::class, \LogisticsGame\Repositories\LimitLoanRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\LoanRepository::class, \LogisticsGame\Repositories\LoanRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\OperationalRepository::class, \LogisticsGame\Repositories\OperationalRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\OperationalDetailRepository::class, \LogisticsGame\Repositories\OperationalDetailRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\CashflowRepository::class, \LogisticsGame\Repositories\CashflowRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\BalanceRepository::class, \LogisticsGame\Repositories\BalanceRepositoryEloquent::class);
        $this->app->bind(\LogisticsGame\Contracts\DreRepository::class, \LogisticsGame\Repositories\DreRepositoryEloquent::class);
        //:end-bindings:
    }
}
