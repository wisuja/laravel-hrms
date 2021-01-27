<?php

namespace App\Providers;

use App\Charts\AttendancesChart;
use App\Charts\PerformanceChart;
use App\Models\Access;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        Paginator::useBootstrap();
        
        $charts->register([
            AttendancesChart::class,
            PerformanceChart::class
        ]);

        View::composer('*', function($view) {
            if(auth()->check()) {
                $accesses = resolve(Access::class)->get(true);
                return $view->with('accesses', $accesses);
            }
        });
    }
}
