<?php

use App\Http\Controllers\Dashboard\auth\logincontroller;
use App\Http\Controllers\Dashboard\auth\restpasswordcontroller;
use App\Http\Controllers\Dashboard\indexcontroller;
use App\Http\Controllers\Dashboard\Rolecontroller;
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
        });




    });