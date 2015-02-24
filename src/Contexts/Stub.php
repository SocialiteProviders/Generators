<?php
namespace SocialiteProviders\Generators\Contexts;

class Stub
{
    /**
     * Create a new stub instance.
     *
     * @param $properties
     */
    public function __construct($properties)
    {
        $this->properties = collect($properties);
    }

    /**
     * Author name.
     */
    public function authorName()
    {
        return $this->properties->get('authorName');
    }

    /**
     * Author email.
     */
    public function authorMail()
    {
        return $this->properties->get('authorMail');
    }

    /**
     * Name in lowercase.
     */
    public function nameLowerCase()
    {
        return strtolower($this->properties->get('name'));
    }

    /**
     * Name in StudlyCase.
     */
    public function nameStudlyCase()
    {
        return studly_case($this->properties->get('name'));
    }

    /**
     * Name in UPPERCASE.
     */
    public function nameUpperCase()
    {
        return strtoupper($this->properties->get('name'));
    }

    /**
     * OAuth Version.
     */
    public function oauthVersion()
    {
        return ($this->properties->get('oauthVersion') === 'oauth1') ? 'OAuth1' : 'OAuth2';
    }

    /**
     * Scopes.
     */
    public function scopes()
    {
        $scopes = $this->properties->get('scopes');

        if (str_contains($scopes, ',')) {
            $scopes = explode(',', $this->properties->get('scopes'));

            return implode("', '", $scopes);
        }

        return $scopes;
    }

    /**
     * Request Token Url.
     */
    public function requestTokenUrl()
    {
        return $this->properties->get('requestTokenUrl');
    }

    /**
     * Authorize Url.
     */
    public function authorizeUrl()
    {
        return $this->properties->get('authorizeUrl');
    }

    /**
     * Access Token Url.
     */
    public function accessTokenUrl()
    {
        return $this->properties->get('accessTokenUrl');
    }

    /**
     * User Info Url.
     */
    public function userDetailsUrl()
    {
        return $this->properties->get('userDetailsUrl');
    }
}
