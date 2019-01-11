<?php

namespace SocialiteProviders\Generators\Compilers;

class OAuth1Compiler extends Compiler
{
    /**
     * Generate the Socialite Extender.
     */
    public function extendSocialite()
    {
        return $this->compile(
            'OAuth1/ExtendSocialite',
            $this->context->nameStudlyCase().'ExtendSocialite.php'
        );
    }

    /**
     * Generate the OAuth1 Provider.
     */
    public function provider()
    {
        return $this->compile('OAuth1/Provider', 'Provider.php');
    }

    /**
     * Generate the OAuth1 Server.
     */
    public function server()
    {
        return $this->compile('OAuth1/Server', 'Server.php');
    }
}
