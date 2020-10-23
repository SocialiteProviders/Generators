namespace SocialiteProviders\{{ $nameStudlyCase }};

use SocialiteProviders\Manager\SocialiteWasCalled;

class {{ $nameStudlyCase }}ExtendSocialite
{
    /**
     * Register the provider.
     *
     * @param \SocialiteProviders\Manager\SocialiteWasCalled $socialiteWasCalled
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('{{ $nameLowerCase }}', Provider::class);
    }
}
