<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    //     Mail::getSymfonyTransport()->setStreamOptions([
    //     'ssl' => [
    //         'verify_peer' => false,
    //         'verify_peer_name' => false,
    //         'allow_self_signed' => true,
    //     ],
    // ]);
        Paginator::useBootstrap();
        foreach(config('permessions_en') as $config_permession=>$value){
            Gate::define($config_permession , function($auth) use($config_permession){
                return $auth->hasAccess($config_permession);
            });
        }
    

    }
}
