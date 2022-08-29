<?php

namespace App\Providers;

use App\Services\EmployeService;
use Illuminate\Support\ServiceProvider;

class EmployeServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->singleton('EmployeService', function($app) {
            return new EmployeService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
