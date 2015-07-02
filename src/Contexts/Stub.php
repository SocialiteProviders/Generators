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
     *
     * @return string
     */
    public function authorName()
    {
        return $this->properties->get('authorName');
    }

    /**
     * Author email.
     *
     * @return string
     */
    public function authorMail()
    {
        return $this->properties->get('authorMail');
    }

    /**
     * Name in lowercase.
     *
     * @return string
     */
    public function nameLowerCase()
    {
        return strtolower($this->properties->get('name'));
    }

    /**
     * Name in StudlyCase.
     *
     * @return string
     */
    public function nameStudlyCase()
    {
        return studly_case($this->properties->get('name'));
    }

    /**
     * Name in UPPERCASE.
     *
     * @return string
     */
    public function nameUpperCase()
    {
        return strtoupper($this->properties->get('name'));
    }

    /**
     * OAuth Version.
     *
     * @return string
     */
    public function oauthVersion()
    {
        return ($this->properties->get('oauthVersion') === 'oauth1') ? 'OAuth1' : 'OAuth2';
    }

    /**
     * Scopes.
     *
     * @return string
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
     *
     * @return string
     */
    public function requestTokenUrl()
    {
        return $this->properties->get('requestTokenUrl');
    }

    /**
     * Authorize Url.
     *
     * @return string
     */
    public function authorizeUrl()
    {
        return $this->properties->get('authorizeUrl');
    }

    /**
     * Access Token Url.
     *
     * @return string
     */
    public function accessTokenUrl()
    {
        return $this->properties->get('accessTokenUrl');
    }

    /**
     * User Info Url.
     *
     * @return string
     */
    public function userDetailsUrl()
    {
        return $this->properties->get('userDetailsUrl');
    }
}
