<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'firebase' => [
        'api_key' => 'AIzaSyBBfDsoY559sF5ls6uWDwSoV2UrsWW29ZM', // Only used for JS integration
        'auth_domain' => 'ipaque-bfd9b.firebaseapp.com', // Only used for JS integration
        'database_url' => 'https://ipaque-bfd9b.firebaseio.com',
        'secret' => 'secret',
        'storage_bucket' => 'ipaque-bfd9b.appspot.com', // Only used for JS integration
    ]

];
