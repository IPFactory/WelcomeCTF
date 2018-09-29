<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProblemServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Problem::class, Problem::class);
    }
}
