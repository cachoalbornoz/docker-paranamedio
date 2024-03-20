<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    'name' => env('APP_NAME', 'Scada PM'),

    'env' => env('APP_ENV', 'production'),

    'debug' => (bool)env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    'timezone' => 'America/Argentina/Buenos_Aires',

    'locale' => 'es',

    'fallback_locale' => 'es',

    'faker_locale' => 'es_AR',

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],

    'providers' => ServiceProvider::defaultProviders()->merge([

        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        // Personalizados
        Collective\Html\HtmlServiceProvider::class,
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
        Biscolab\ReCaptcha\ReCaptchaServiceProvider::class,
        Laraveles\Spanish\SpanishServiceProvider::class,
        Yajra\DataTables\DataTablesServiceProvider::class,
        Intervention\Image\ImageServiceProvider::class,


    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([

        'Form'  => Collective\Html\FormFacade::class,
        'Html'  => Collective\Html\HtmlFacade::class,
        'ReCaptcha' => Biscolab\ReCaptcha\Facades\ReCaptcha::class,
        'DataTables' => Yajra\DataTables\Facades\DataTables::class,
        'Image' => Intervention\Image\Facades\Image::class,
        
    ])->toArray(),

];
