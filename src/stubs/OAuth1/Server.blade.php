namespace SocialiteProviders\{{ $nameStudlyCase }};

use League\OAuth1\Client\Credentials\TokenCredentials;
use SocialiteProviders\Manager\OAuth1\Server as BaseServer;
use SocialiteProviders\Manager\OAuth1\User;

class Server extends BaseServer
{
    /**
     * {@inheritDoc}
     */
    public function urlTemporaryCredentials()
    {
        return '{{ $requestTokenUrl }}';
    }

    /**
     * {@inheritDoc}
     */
    public function urlAuthorization()
    {
        return '{{ $authorizeUrl }}';
    }

    /**
     * {@inheritDoc}
     */
    public function urlTokenCredentials()
    {
        return '{{ $accessTokenUrl }}';
    }

    /**
     * {@inheritDoc}
     */
    public function urlUserDetails()
    {
        return '{{ $userDetailsUrl }}';
    }

    /**
     * {@inheritDoc}
     */
    public function userDetails($data, TokenCredentials $tokenCredentials)
    {
        $user           = new User();
        $user->id       = $data['id'];
        $user->nickname = $data['nickname'];
        $user->name     = $data['name'];
        $user->email    = $data['email'];
        $user->avatar   = $data['avatar'];

        $used = ['id', 'nickname', 'name', 'email', 'avatar'];

        foreach ($data as $key => $value) {
            if (!in_array($key, $used)) {
                $used[] = $key;
            }
        }

        $user->extra = array_diff_key($data, array_flip($used));

        return $user;
    }

    /**
     * {@inheritDoc}
     */
    public function userUid($data, TokenCredentials $tokenCredentials)
    {
        return $data['id'];
    }

    /**
     * {@inheritDoc}
     */
    public function userEmail($data, TokenCredentials $tokenCredentials)
    {
        return $data['email'];
    }

    /**
     * {@inheritDoc}
     */
    public function userScreenName($data, TokenCredentials $tokenCredentials)
    {
        return $data['screen_name'];
    }
}
