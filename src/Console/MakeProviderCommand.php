<?php

namespace SocialiteProviders\Generators\Console;

use Illuminate\Console\Command;
use SocialiteProviders\Generators\Compilers\OAuth1Compiler;
use SocialiteProviders\Generators\Compilers\OAuth2Compiler;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeProviderCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:socialite';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new OAuth1 Provider.';

    /**
     * Create a new controller creator command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function fire()
    {
        $data = [
            'name' => $this->argument('name'),
            'authorName' => $this->option('author'),
            'authorMail' => $this->option('email'),
            'oauthVersion' => $this->option('spec'),
            'scopes' => $this->option('scopes'),
            'requestTokenUrl' => $this->option('request_token_url'),
            'authorizeUrl' => $this->option('authorize_url'),
            'accessTokenUrl' => $this->option('access_token_url'),
            'userDetailsUrl' => $this->option('user_details_url'),
        ];

        if ($this->option('spec') === 'oauth1') {
            $compiler = new OAuth1Compiler($data);
        } elseif ($this->option('spec') === 'oauth2') {
            $compiler = new OAuth2Compiler($data);
        } else {
            return $this->error('Neither OAuth1 nor OAuth2 was specified.');
        }

        $compiler->gitignore();
        $compiler->styleci();
        $compiler->composer();
        $compiler->license();
        $compiler->readme();
        $compiler->extendSocialite();
        $compiler->provider();

        if ($this->option('spec') === 'oauth1') {
            $compiler->server();
        }

        $this->info('Provider created successfully.');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Name of the provider.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['spec', null, InputOption::VALUE_REQUIRED, 'The OAuth version that should be used.'],
            ['author', null, InputOption::VALUE_REQUIRED, 'The name of the author.'],
            ['email', null, InputOption::VALUE_REQUIRED, 'The email of the author.'],
            ['scopes', null, InputOption::VALUE_OPTIONAL, 'The scopes to be requested.'],
            ['request_token_url', null, InputOption::VALUE_OPTIONAL, 'The Request-Token-Endpoint URL.'],
            ['authorize_url', null, InputOption::VALUE_OPTIONAL, 'The Authorization-Endpoint URL.'],
            ['access_token_url', null, InputOption::VALUE_OPTIONAL, 'The Access-Token-Endpoint URL.'],
            ['user_details_url', null, InputOption::VALUE_OPTIONAL, 'The User-Details-Endpoint URL.'],
        ];
    }
}
