{
    "name": "socialiteproviders/{{ $nameLowerCase }}",
    "description": "{{ $nameStudlyCase }} {{ $oauthVersion }} Provider for Laravel Socialite",
    "license": "MIT",
    "authors": [{
        "name": "{{ $authorName }}",
        "email": "{{ $authorMail }}"
    }],
    "require": {
        "php": "^7.4 || ^8.0",
        "ext-json": "*",
        "socialiteproviders/manager": "^4.0"
    },
    "autoload": {
        "psr-4": {
            "SocialiteProviders\\{{ $nameStudlyCase }}\\": ""
        }
    }
}
