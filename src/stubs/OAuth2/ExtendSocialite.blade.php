namespace SocialiteProviders\{{ $nameStudlyCase }};

use SocialiteProviders\Manager\SocialiteWasCalled;

class {{ $nameStudlyCase }}ExtendSocialite
{
    /**
     * Register the provider.
     *
     * @param  \SocialiteProviders\Manager\SocialiteWasCalled  $socialiteWasCalled
     * @return void
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled): void
    {
        $socialiteWasCalled->extendSocialite('{{ $nameLowerCase }}', Provider::class);
    }
}
