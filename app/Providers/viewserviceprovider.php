<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class viewserviceprovider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    
        $gettsetting=$this->createorfirst();
         view()->share(['settings'=>$gettsetting]);
    }
    public function createorfirst(){
        $gettsetting=Setting::firstOrCreate([
            'site_name'=>['en'=>'fhgfhgh','ar'=>'بقسيبيل'],
            'site_desc'=>['en'=>'fhgfhgh','ar'=>'بقسيبيل'],
            'site_phone'=>'jjjjjjjjjjjjjjjjjjjj',
            'site_address'=>'jjjjjjjjjjjjjjjjjjjj',
            'site_email'=>'mostafa@ff.com',
            'email_support'=>'support@ff.com',
            'facebook_url'=>'jjjjjjjjjjjjjjjjjjjj',
            'twitter_url'=>'jjjjjjjjjjjjjjjjjjjj',
            'youtube_url'=>'jjjjjjjjjjjjjjjjjjjj',
            'favicon'=>'jjjjjjjjjjjjjjjjjjjj',
            'site_copyright'=>'jjjjjjjjjjjjjjjjjjjj',
            'promotion_video_url'=>'jjjjjjjjjjjjjjjjjjjj',
        ]);
        return $gettsetting;
      
    }

}
