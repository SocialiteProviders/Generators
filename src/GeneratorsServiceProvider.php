<?php

namespace SocialiteProviders\Generators;

use Illuminate\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function register()
    {
        $this->commands('SocialiteProviders\Generators\Console\MakeProviderCommand');
    }
}
