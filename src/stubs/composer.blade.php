{
    "name": "socialiteproviders/{{ $nameLowerCase }}",
    "description": "{{ $nameStudlyCase }} {{ $oauthVersion }} Provider for Laravel Socialite",
    "license": "MIT",
    "keywords": [
        "{{ $nameLowerCase }}",
        "laravel",
        "oauth",
        "oauth2",
        "provider",
        "socialite"
    ],
    "authors": [
        {
            "name": "{{ $authorName }}",
            "email": "{{ $authorMail }}"
        }
    ],
    "require": {
        "php": "^8.0",
        "ext-json": "*",
        "socialiteproviders/manager": "^4.4"
    },
    "autoload": {
        "psr-4": {
            "SocialiteProviders\\{{ $nameStudlyCase }}\\": ""
        }
    }
}
