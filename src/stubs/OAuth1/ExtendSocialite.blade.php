namespace SocialiteProviders\{{ $nameStudlyCase }};

use SocialiteProviders\Manager\SocialiteWasCalled;

class {{ $nameStudlyCase }}ExtendSocialite
{
    /**
     * Execute the provider.
     *
     * @param  \SocialiteProviders\Manager\SocialiteWasCalled  $socialiteWasCalled
     * @return void
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('{{ $nameLowerCase }}', __NAMESPACE__.'\Provider', __NAMESPACE__.'\Server');
    }
}
