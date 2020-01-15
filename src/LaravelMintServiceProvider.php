<?php

namespace Yab\LaravelMint;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\FactoryBuilder;
use Yab\LaravelMint\Macros\FactoryBuilder as FactoryBuilderMacros;

class LaravelMintServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        FactoryBuilder::mixin(new FactoryBuilderMacros);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        
    }
}
