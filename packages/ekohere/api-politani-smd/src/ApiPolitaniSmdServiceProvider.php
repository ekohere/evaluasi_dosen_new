<?php

namespace Britech\ApiPolitaniSmd;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;;

class ApiPolitaniSmdServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->bind('api-politani-smd', function() {
            return new ApiPolitaniSmd;
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/api-politani-smd.php' => config_path('api-politani-smd.php'),
        ], 'api-politani-smd');
    }
}
