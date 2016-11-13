namespace SocialiteProviders\{{ $nameStudlyCase }};

use SocialiteProviders\Manager\OAuth1\AbstractProvider;
use SocialiteProviders\Manager\OAuth1\User;

class Provider extends AbstractProvider
{
    /**
     * Unique Provider Identifier.
     */
    const IDENTIFIER = '{{ $nameUpperCase }}';

    /**
     * {@inheritDoc}
     */
    public function user()
    {
        if (! $this->hasNecessaryVerifier()) {
            throw new \InvalidArgumentException("Invalid request. Missing OAuth verifier.");
        }

        $user = $this->server->getUserDetails($token = $this->getToken());

        return (new User())->setRaw($user->extra)->map([
            'id'       => $user->id,
            'nickname' => $user->nickname,
            'name'     => $user->name,
            'email'    => $user->email,
            'avatar'   => $user->avatar,
        ])->setToken($token->getIdentifier(), $token->getSecret());
    }
}
