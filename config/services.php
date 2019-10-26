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
        'client_id' => env ('FACEBOOK_ID'),
        'client_secret' => env ('FACEBOOK_SECRET'),
        'redirect' => env ('FACEBOOK_URL'),
    ],

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID', 'Iv1.2fb070dc517cdedc'),
        'client_secret' => env('GITHUB_CLIENT_SECRET', '577fcd18d6fb74a0a9499f7edad35b26837f6712'),
        'redirect' => 'http://gastos_auth.test/login/github/callback',
    ],

];

/*
stripe
*/
/*AGREGANDO FACEBOOK TWITER Y LINKEDIN PARA INICIO DE SECCION */

/*AGREGAMOS SESION CON GITHUB EN EL PROYECTO*/