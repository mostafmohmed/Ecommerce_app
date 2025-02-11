<?php

use App\Http\Controllers\Dashboard\Admincontroller;
use App\Http\Controllers\Dashboard\auth\logincontroller;
use App\Http\Controllers\Dashboard\auth\restpasswordcontroller;
use App\Http\Controllers\Dashboard\Brandeconrtoller;
use App\Http\Controllers\Dashboard\Categoryconrtoller;
use App\Http\Controllers\Dashboard\indexcontroller;
use App\Http\Controllers\Dashboard\Rolecontroller;
use App\Http\Controllers\Dashboard\wordconrtoller;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() .'/dashpoard',
        'as'=>'dashpoard.',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        
        
        Route::get('/login',[logincontroller::class,'showlogin'])->name('login');
        Route::post('/login',[logincontroller::class,'login'])->name('post.login');
       
        
       Route::get('/showemail',[restpasswordcontroller::class,'showemailform'])->name('show.email');
       Route::post('/showotp',[restpasswordcontroller::class,'sendotp'])->name('sendotp');

       Route::get('/showotpform/{email}',[restpasswordcontroller::class,'showotpform'])->name('showotpform');
       Route::post('/verfiyotp',[restpasswordcontroller::class,'verfiyotp'])->name('verfiyotp');


       Route::get('/showresetform/{email}',[restpasswordcontroller::class,'showresetform'])->name('showresetform');

       Route::post('/resetpassword',[restpasswordcontroller::class,'resetpassword'])->name('resetpassword');



       
        Route::group(['middleware' => 'auth:admin'],function () {
            Route::get('/welcome',[indexcontroller::class,'index'])->name('index');
            Route::post('/logout',[logincontroller::class,'logout'])->name('logout');
Route::resource('/Role',Rolecontroller::class);
Route::resource('/Admin',Admincontroller::class);
Route::controller('Admin/changeStatus',[Admincontroller::class,'changeStatus']);




Route::group(['middleware' => 'can:global_shipping'],function(){
    Route::controller(wordconrtoller::class)->group(function(){
        Route::prefix('countries')->name('countries.')->group(function () {
            Route::get('/', 'getAllCountries')->name('index');
            Route::get('/{country_id}/governorates',     'getGovsByCountry')->name('governorates.index');
            Route::get('/changestatuscountry/{id}', 'changesstatuscountry')->name('status');
            
        });


    });
    Route::controller(wordconrtoller::class)->group(function(){
        Route::prefix('governorates')->name('governorates.')->group(function () {
            Route::put('/shipping-price', 'changeshipping')->name('shipping-price');
          
            Route::get('/changestatusgoverment/{id}', 'changesstatusgoverment')->name('status');
            
        });


    });
   });


Route::group(['middleware' => 'can:global_shipping'],function (){
    
    Route::resource('/category',Categoryconrtoller::class);
    Route::get('/categorys-all',[Categoryconrtoller::class,'getall'])->name('getall');

});

Route::group(['middleware' => 'can:brands'],function(){
    
    Route::resource('/Brande',Brandeconrtoller::class);
    Route::get('/Brandes-all',[Brandeconrtoller::class,'getall'])->name('brandsgetall');
});
        });
    




    });