<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(base_path('routes/dashboard.php'));

        }
    )
       
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(function () {
            if (request()->is('*/dashboard/*')) {
                return route('dashboard.login');
            }
        });

        $middleware->redirectUsersTo(function () {
            if (Auth::guard('admin')->check()) {
                return route('dashboard.index');
            } else {
                return route('');
            }
        });

        $middleware->alias([
            'localize'              => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            'localizationRedirect'  => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            'localeSessionRedirect' => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            'localeCookieRedirect'  => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
            'localeViewPath'        => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
            'guestt'                => \App\Http\Middleware\Authorie::class,
            'checkuser'             => \App\Http\Middleware\User::class,
        ]);
    }) ->withProviders([
        App\Providers\BroadcastServiceProvider::class, // ✅ هنا
    ])
    ->withExceptions(function (Exceptions $exceptions) {
        // تعريف معالجة الاستثناءات هنا
    })
    ->create();
