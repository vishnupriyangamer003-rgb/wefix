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

    'recaptcha' => [
        'site_key' => env('RECAPTCHA_SITE_KEY'),
        'secret' => env('RECAPTCHA_SECRET_KEY'),
        // Per-domain keys: the key pair is picked from the request host (www. ignored).
        'sites' => [
            'jinnahcoconutnurserygarden.com' => ['site_key' => env('RECAPTCHA_SITE_KEY_JINNAHCOCONUTNURSERYGARDEN_COM'), 'secret' => env('RECAPTCHA_SECRET_KEY_JINNAHCOCONUTNURSERYGARDEN_COM')],
            'jinnahcoconutnursery.com' => ['site_key' => env('RECAPTCHA_SITE_KEY_JINNAHCOCONUTNURSERY_COM'), 'secret' => env('RECAPTCHA_SECRET_KEY_JINNAHCOCONUTNURSERY_COM')],
            'jinnahcoconutnurserygarden.in' => ['site_key' => env('RECAPTCHA_SITE_KEY_JINNAHCOCONUTNURSERYGARDEN_IN'), 'secret' => env('RECAPTCHA_SECRET_KEY_JINNAHCOCONUTNURSERYGARDEN_IN')],
            'jinnahcoconutnursery.in' => ['site_key' => env('RECAPTCHA_SITE_KEY_JINNAHCOCONUTNURSERY_IN'), 'secret' => env('RECAPTCHA_SECRET_KEY_JINNAHCOCONUTNURSERY_IN')],
        ],
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
