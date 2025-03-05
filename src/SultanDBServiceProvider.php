<?php

namespace SultanDB;

use Illuminate\Support\ServiceProvider;

class SultanDBServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/db-failover.php' => config_path('db-failover.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/db-failover.php', 'db-failover'
        );
    }
}