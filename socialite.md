# How to make authentication with Social media like Google

## Reference
https://laravel.com/docs/8.x/socialite
https://socialiteproviders.com/
https://www.hibit.dev/posts/59/social-authentication-with-laravel-socialite

## Before you try socialite you should implemenation at least basic authentication like breeze.

- backup your file : routes/web.php (breeze will try to clear your content in web.php)

- for laravel 8
```bash
php artisan migrate
composer require laravel/breeze:1.9.2
php artisan breeze:install
npm install && npm run dev
```

## Set up dependencies

```bash
# core
composer require laravel/socialite
# provider(s) you need
composer require socialiteproviders/google
```

## Make some configuations

- .env

```env
APP_URL=http://localhost:8000

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
# GOOGLE_REDIRECT_URI="http://example.com/callback-url"
GOOGLE_REDIRECT_URI="auth/google/callbacke"
```

- config/services.php

```php
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URI'),
],
```

- app/Providers/EventServiceProvider.php
```php
protected $listen = [
    Registered::class => [
        SendEmailVerificationNotification::class,
    ],
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        // ... other providers
        \SocialiteProviders\Google\GoogleExtendSocialite::class.'@handle',
    ],
];

```
- config/app.php

```php
'providers' => [
    ...

    // Insert this line 
    SocialiteProviders\Manager\ServiceProvider::class,

],
```

- Close and Restart your VS Code
- php artisan config:cache

## Write some code

- auth/login.blade.php : insert code before submit button

```php
{{-- social button --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<div class="flex justify-center mt-4">
    <a href="{{ url('login/google') }}" style="padding: 10px;"><i class="bi bi-google"></i></a>
    <a href="{{ url('login/facebook') }}" style="padding: 10px;"><i class="bi bi-facebook"></i></a>
    <a href="{{ url('login/line') }}" style="padding: 10px;"><i class="bi bi-line"></i></a>
</div>
{{-- social button end --}}
```
    

