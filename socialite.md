# How to make authentication with Social media like Google, Facebook, Line

## Reference
https://laravel.com/docs/8.x/socialite
https://socialiteproviders.com/
https://www.hibit.dev/posts/59/social-authentication-with-laravel-socialite



## Set up dependencies

```bash
composer require laravel/socialite
```

## Make some configuations

- .env

```env
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI="http://example.com/callback-url"
```

- config/services.php

```php
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URI'),
],
```

## Write some code

- auth/login.blade.php

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
    

