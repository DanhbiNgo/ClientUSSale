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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
    'client_id' => '1065818847291222',
    'client_secret' => '24aab475e58c94bb9d4bdcdc96349d16',
    'redirect' => 'https://localhost/ClientUs/public/login/facebook/callback',
    ],
     'google' => [
    'client_id' => '719991806599-lu136udsldlucg4e93n57esos8rifgf8.apps.googleusercontent.com',
    'client_secret' => 'pc5GarxkgwiEDOL2pzRarjxT',
    'redirect' => 'https://localhost/ClientUs/public/login/google/callback',
    ],

];
