<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brande;
use App\Models\Broduct;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class CacheProvider extends ServiceProvider
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
    public function produectBerWeak(){
$startOfWeek = Carbon::now()->startOfWeek();
$endOfWeek = Carbon::now()->endOfWeek();

$bestSellingProducts = DB::table('orderitems')
    ->select('prodect_id', DB::raw('SUM(produect_quantity) as total_sold'))
    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
    ->groupBy('prodect_id')
    ->orderByDesc('total_sold')
    ->limit(10)
    ->get();


    $productIds = $bestSellingProducts->pluck('prodect_id');

$products = Broduct::whereIn('id', $productIds)->get();
return $products;
    }
    public function boot(): void
    {
        

        if(!Cache::has('produectBerWeak')){
            Cache::remember('produectBerWeak',now()->addMinutes(60),function (){ return $this->produectBerWeak();});
        }
        if(!Cache::has('category_count')){
            Cache::remember('category_count',now()->addMinutes(60),function (){ return Category::count();});
        }
        if(!Cache::has('brand_count')){
            Cache::remember('brand_count',now()->addMinutes(60),function (){ return Brande::count();});
        }
        if(!Cache::has('Admin_count')){
            Cache::remember('Admin_count',now()->addMinutes(60),function (){ return Admin::count();});
        }
        view()->share(['category_count'=>Cache::get('category_count'),'brand_count'=>Cache::get('brand_count'),'Admin_count'=>Cache::get('Admin_count'),'produectBerWeak'=>Cache::get('produectBerWeak'),]);
    
    }
}
