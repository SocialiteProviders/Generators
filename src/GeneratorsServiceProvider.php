<?php

namespace SocialiteProviders\Generators;

use Illuminate\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/stubs', 'generator.stubs');
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        $this->commands(Console\MakeProviderCommand::class);
    }
}
