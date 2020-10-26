{
    "name": "socialiteproviders/{{ $nameLowerCase }}",
    "description": "{{ $nameStudlyCase }} {{ $oauthVersion }} Provider for Laravel Socialite",
    "license": "MIT",
    "authors": [{
        "name": "{{ $authorName }}",
        "email": "{{ $authorMail }}"
    }],
    "require": {
        "php": "^7.2",
        "socialiteproviders/manager": "^4.0",
        "ext-json": "*"
    },
    "autoload": {
        "psr-4": {
            "SocialiteProviders\\{{ $nameStudlyCase }}\\": ""
        }
    }
}
