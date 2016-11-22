<?php

namespace vidhyar2612\Enveditor;

use Illuminate\Support\ServiceProvider;

class EnveditorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Provide a shortcut to the EnveditorStore for injecting into classes.
        $this->app->bind('vidhyar2612\Enveditor\EnveditorStore');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
