<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\website\categoryController;
use App\Http\Controllers\website\FqsController;
use App\Http\Controllers\website\homecontroller;
use App\Http\Controllers\website\ProduectController;
use App\Models\City;
use App\Models\Governreate;
use App\Models\Role;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/', function () {
    return 
phpinfo();
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() .'/website',
        'as'=>'website.',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //
        Route::middleware(['checkuser'])->group(function () {
   Route::get('/cities/{id}',function($id){
           $city= Governreate::where('country_id',$id)->get();
            return response()->json(['status'=>true,'cities'=> $city]);
        })->name('city');
        
        Route::get('/home',[homecontroller::class,'home'])->name('home');
        Route::prefix('/category')->name('categories.')->controller(categoryController::class)->group(function(){
  Route::get('/categories','categoriesall')->name('all');
   Route::get('/proudects/{slug}','getproudectsBycategory')->name('getproudectsBycategory');
        });
         
        Route::get('brande/{slug}/proudects',[homecontroller::class,'getproduectsbybrande'])->name('brande.proudects');
Route::get('/fqs',[FqsController::class,'getfqs'])->name('fqs.home');
Route::post('/sendquestion',[FqsController::class,'sendquestions'])->name('fqs.sendquestions');


        });
       
Route::get('/produect-view-all/{type}',[ProduectController::class,'prodectype'])->name('produect.type');  
Route::get('/produect/{slug}',[ProduectController::class,'showproduect'])->name('produect');      
Route::controller(RegisterController::class)->group(function(){
   Route::get('/register','showRegistrationForm'); 
   Route::post('/register','register')->name('register');
//    Auth::routes(); 

});
Route::controller(LoginController::class)->group(function(){
    Route::get('/login','showLoginForm'); 
    Route::post('/login','login')->name('login');
 //    Auth::routes(); 
 
 });


// });
    }
);


 