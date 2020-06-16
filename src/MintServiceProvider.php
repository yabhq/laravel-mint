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
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        
    }
}
