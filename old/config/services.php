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
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],


    'facebook' => [
        'client_id' => "2098155090298101",
        'client_secret' => "9eb589e3c8c02aeff063e16483949dc2",
        'redirect' => "https://mistri.pochondoo.xyz/callback/facebook",
    ],

    'linkedin' => [
        'client_id' => "",
        'client_secret' => "",
        'redirect' => "https://mistri.pochondoo.xyz/callback/LinkedIn"
    ],

    'google' => [
        'client_id' => "1068959391573-75mi4dp7ocpo2fmba0une9mdtup8ssd6.apps.googleusercontent.com",
        'client_secret' => "pvZp1H9_vGPU7ny7gE9vAxqO",
        'redirect' => "https://mistri.pochondoo.xyz/callback/Google"
    ],





];
