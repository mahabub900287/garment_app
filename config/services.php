<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    /*.......
    Social Login Services
    .......*/
    'facebook' => [
        'client_id'     => '726301432223863',
        'client_secret' => 'fca085667fe93c7e9eef53f7a6b72926',
        'redirect'      => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id'     => '881290527666-60t5a4nstsmablmk55jgpdb5i66oremj.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'      => 'http://127.0.0.1:8000/auth/google/callback',
    ],

];
