<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option defines the default authentication "guard" and password
    | reset "broker" for your application. You may change these values
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // Can keep 'web', or set to null if no guard is ever used
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'), // Can keep 'users', or set to null
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Here you may define every authentication guard for your application.
    | For a minimal app without auth, this can be empty or have a null driver.
    |
    */

    'guards' => [
        'web' => [
            'driver' => null, // Or 'session' if you still use sessions for other things like flash messages
            'provider' => null,
        ],
        'api' => [ // Often present by default, can also be nulled if not using API token auth
            'driver' => null,
            'provider' => null,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Since we are not using users, this can be minimal.
    |
    */

    'providers' => [
        'users' => [
            'driver' => null, // Setting driver to null as we don't have a user model or table
            // 'model' => App\Models\User::class, // REMOVE THIS LINE
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Password reset functionality is not needed.
    |
    */

    'passwords' => [
        // 'users' => [
        //     'provider' => 'users',
        //     'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
        //     'expire' => 60,
        //     'throttle' => 60,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Not needed if not using password features.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
