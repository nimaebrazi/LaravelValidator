<?php

namespace nimaebrazi\LaravelValidator;

use Illuminate\Support\ServiceProvider;

class LaravelValidatorServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/laravel_validator.php' => config_path('laravel_validator.php'),
        ]);
    }
}
