<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brande;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class cacheprovider extends ServiceProvider
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
        if(!Cache::has('category_count')){
            Cache::remember('category_count',now()->addMinutes(60),function (){ return Category::count();});
        }
        if(!Cache::has('brand_count')){
            Cache::remember('brand_count',now()->addMinutes(60),function (){ return Brande::count();});
        }
        if(!Cache::has('Admin_count')){
            Cache::remember('Admin_count',now()->addMinutes(60),function (){ return Admin::count();});
        }
        view()->share(['category_count'=>Cache::get('category_count'),'brand_count'=>Cache::get('brand_count'),'Admin_count'=>Cache::get('Admin_count')]);
    
    }
}
