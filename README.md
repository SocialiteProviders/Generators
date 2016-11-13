# Artisan Generators for OAuth1/OAuth2 Providers

[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/SocialiteProviders/Generators.svg?style=flat-square)](https://scrutinizer-ci.com/g/SocialiteProviders/Generators/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/socialiteproviders/generators.svg?style=flat-square)](https://packagist.org/packages/socialiteproviders/generators)
[![Total Downloads](https://img.shields.io/packagist/dt/socialiteproviders/generators.svg?style=flat-square)](https://packagist.org/packages/socialiteproviders/generators)
[![Latest Unstable Version](https://img.shields.io/packagist/vpre/socialiteproviders/generators.svg?style=flat-square)](https://packagist.org/packages/socialiteproviders/generators)
[![License](https://img.shields.io/packagist/l/socialiteproviders/generators.svg?style=flat-square)](https://packagist.org/packages/socialiteproviders/generators)

## Contents

- [About](#about)
- [Installation](#installation)
  - [1. Composer](#1-composer)
  - [2. Service Provider](#2-service-provider)
- [Usage](#usage)

## About

A Laravel Package to generate OAuth1/OAuth2 Providers that are compatible with the Socialite Providers Manager.

## Installation

### 1. Composer

```bash
composer require socialiteproviders/generators
```

### 2. Service Provider

Add the ServiceProvider to the providers array in the `config/app.php`.

```php
'providers' => [
    SocialiteProviders\Generators\GeneratorsServiceProvider::class,
],
```

## Usage

### Generate OAuth1 Provider
```bash
php artisan make:socialite Dropbox --spec=oauth1 --author=YourName --email=your@name.com
```

### Generate OAuth1 Provider with URLs
```bash
php artisan make:socialite Dropbox --spec=oauth1 --author=YourName --email=your@name.com --request_token_url=http://myapp.io/oauth/request_token --authorize_url=http://myapp.io/oauth/authorize --access_token_url=http://myapp.io/oauth/access_token --user_details_url=http://myapp.io/users/me
```

### Generate OAuth2 Provider
```bash
php artisan make:socialite Dropbox --spec=oauth2 --author=YourName --email=your@name.com
```

### Generate OAuth2 Provider with URLs and Scope
```bash
php artisan make:socialite Dropbox --spec=oauth2 --author=YourName --email=your@name.com --scopes=basic --authorize_url=http://myapp.io/oauth/authorize --access_token_url=http://myapp.io/oauth/access_token --user_details_url=http://myapp.io/users/me
```
