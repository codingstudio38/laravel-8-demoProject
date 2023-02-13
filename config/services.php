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


    'google' => [
        'client_id' => "405380673874-2r76m5noi0bgkg51tlm279s2giqdcrrk.apps.googleusercontent.com",
        'client_secret' => "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",
        'redirect' => "http://127.0.0.1:8000/google-callback",
    ],


    'facebook' => [
        'client_id' => "1239993813274457",
        'client_secret' => "04abb2fe1a8fe17caa77672586d36710",
        'redirect' => "https://localhost/laravel/demoProject/public/facebook-callback",
    ],

];
