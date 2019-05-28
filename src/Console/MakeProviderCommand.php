<?php

namespace SocialiteProviders\Generators\Console;

use Illuminate\Console\Command;
use SocialiteProviders\Generators\Compilers\Compiler;
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
    public function handle()
    {
        $data = [
            'name'            => $this->argument('name'),
            'authorName'      => $this->option('author'),
            'authorMail'      => $this->option('email'),
            'oauthVersion'    => $this->option('spec'),
            'scopes'          => $this->option('scopes'),
            'requestTokenUrl' => $this->option('request_token_url'),
            'authorizeUrl'    => $this->option('authorize_url'),
            'accessTokenUrl'  => $this->option('access_token_url'),
            'userDetailsUrl'  => $this->option('user_details_url'),
        ];

        switch ($this->option('spec')) {
            case 'oauth1':
                $compiler = new OAuth1Compiler($data);
            break;

            case 'oauth2':
                $compiler = new OAuth2Compiler($data);
            break;

            default:
                return $this->error('Neither OAuth1 nor OAuth2 was specified.');
            break;
        }

        $compiler->composer();
        $compiler->extendSocialite();
        $compiler->provider();

        if ($this->option('spec') === 'oauth1') {
            $compiler->server();
        }

        $this->addToComposer($compiler);

        $this->info('Provider generated. Run "composer dumpautoload" and "composer require socialiteproviders/manager" to get started.');
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

    /**
     * @param \SocialiteProviders\Generators\Compilers\Compiler $compiler
     */
    private function addToComposer(Compiler $compiler)
    {
        $contents = json_decode(file_get_contents($filename = base_path('composer.json')), true);

        $providerName = $compiler->getContext()->nameStudlyCase();
        $contents['autoload']['psr-4']["SocialiteProviders\\$providerName\\"] = "SocialiteProviders/src/$providerName/";

        file_put_contents($filename, json_encode($contents, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
