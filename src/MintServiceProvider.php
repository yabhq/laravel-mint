<?php

namespace Yab\Mint;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\FactoryBuilder;
use Yab\Mint\Macros\FactoryBuilder as FactoryBuilderMacros;

class MintServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        FactoryBuilder::mixin(new FactoryBuilderMacros);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/Stubs' => app_path('stubs'),
            ], 'stubs');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
