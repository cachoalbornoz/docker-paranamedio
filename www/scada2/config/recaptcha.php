<?php
/**
 * Copyright (c) 2017 - present
 * LaravelGoogleRecaptcha - recaptcha.php
 * author: Roberto Belotti - roby.belotti@gmail.com
 * web : robertobelotti.com, github.com/biscolab
 * Initial version created on: 12/9/2018
 * MIT license: https://github.com/biscolab/laravel-recaptcha/blob/master/LICENSE
 */

/**
 * To configure correctly please visit https://developers.google.com/recaptcha/docs/start
 */
return [


    'api_site_key'                 => env('RECAPTCHA_SITE_KEY', '6LdxcnUUAAAAAM5R_2E_NknVIft2KxtIiEoJNx3h'),
    'api_secret_key'               => env('RECAPTCHA_SECRET_KEY', '6LdxcnUUAAAAADI2DkqCkGZ1WAp4y8zzG9S2y-Ow'),

    'version'                      => 'v2',

    'curl_timeout'                 => 10,

    'skip_ip'                      => [],

    'default_validation_route'     => 'biscolab-recaptcha/validate',

    'default_token_parameter_name' => 'token',

    'default_language'             => null,

    'default_form_id'              => 'biscolab-recaptcha-invisible-form',

    /**
     *
     * Deferring the render can be achieved by specifying your onload callback function and adding parameters to the JavaScript resource.
     * It has no effect with v3 and invisible
     * @see   https://developers.google.com/recaptcha/docs/display#explicit_render
     * @since v4.0.0
     * Supported true, false
     *
     */
    'explicit'                     => false,

    'tag_attributes'               => [

        'theme'            => 'light',

        'size'             => 'normal',

        'tabindex'         => 0,

        'callback'         => null,

        'expired-callback' => null,

        'error-callback'   => null,
    ]
];
