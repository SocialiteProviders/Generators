{
    "name": "socialiteproviders/{{ $nameLowerCase }}",
    "description": "{{ $nameStudlyCase }} {{ $oauthVersion }} Provider for Laravel Socialite",
    "license": "MIT",
    "authors": [
        {
            "name": "{{ $authorName }}",
            "email": "{{ $authorMail }}"
        }
    ],
    "require": {
        "php": "^8.0",
        "ext-json": "*",
        "socialiteproviders/manager": "^4.2"
    },
    "autoload": {
        "psr-4": {
            "SocialiteProviders\\{{ $nameStudlyCase }}\\": ""
        }
    }
}
