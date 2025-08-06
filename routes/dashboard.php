<?php

use App\Events\NewMessage;
use App\Http\Controllers\Dashboard\Admincontroller;
use App\Http\Controllers\testfirebaseController;

use App\Http\Controllers\Dashboard\AttributeController;
use App\Http\Controllers\Dashboard\auth\logincontroller;
use App\Http\Controllers\Dashboard\auth\restpasswordcontroller;
use App\Http\Controllers\Dashboard\Brandeconrtoller;
use App\Http\Controllers\Dashboard\Categoryconrtoller;
use App\Http\Controllers\Dashboard\Contactcontroller;
use App\Http\Controllers\Dashboard\Couponsconrtoller;
use App\Http\Controllers\Dashboard\indexcontroller;
use App\Http\Controllers\Dashboard\orderController;
use App\Http\Controllers\Dashboard\produectcontroller;
use App\Http\Controllers\Dashboard\Rolecontroller;
use App\Http\Controllers\Dashboard\wordconrtoller;
use App\Http\Controllers\ddcontroller;
use App\Http\Controllers\Fqscontroller;
use App\Http\Controllers\website\Fqscontroller as webFqscontroller;
use App\Http\Controllers\Dashboard\sliderController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;








Route::middleware('auth:admin')->post('/admin/save-fcm-token', [testfirebaseController::class, 'saveFcmToken']);
Route::get('/notifyAllAdmins',[testfirebaseController::class,'notifyAllAdmins']);



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() .'/dashpoards',
        'as'=>'dashpoard.',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
        // Route::get('/kk',function(){
        //     return view('tesi');
        //     });
//     Route::get('/welcome',function(){
//    return phpinfo();

// });
Route::get('/component-view/{id}', function ($id) {
    $message = Contact::findOrFail($id);
    return view('components.message-content', ['message' => $message]);
});
Route::delete('/force-delete-massage/{id}', [Contactcontroller::class, 'forceDelete'])->name('massage.forceDelete');
Route::delete('/delete-massage/{id}', [Contactcontroller::class, 'Delete'])->name('massage.Delete');

          Route::post('/question/sendawnser',[webFqscontroller::class,'sendawnser'])->name('questions.sendawnser');
         Route::get('/question/getall',[webFqscontroller::class,'getall'])->name('questions.getall');
        Route::get('/question',[webFqscontroller::class,'index'])->name('questions.index');
        Route::get('/contact',[Contactcontroller::class,'massages']);
        Route::get('/contact_details/{id}',[Contactcontroller::class,'contact_details'])->name('contact_details');
        
        Route::get('/contact_search',[Contactcontroller::class,'search'])->name('contact_search');
        Route::post('/mark_unreade/{id}',[Contactcontroller::class,'mark_unreade'])->name('mark_unreade');
        
        Route::controller(sliderController::class)->group(function(){
            Route::get('/sliders','slider')->name('sliders')   ;
            Route::post('/slider','store')->name('slider.store')   ;
            Route::delete('/slider/delete/{id}','destroy')->name('slider.destroy')   ;
            
            Route::get('/slidersall','slidersall')->name('slidersall')   ;
            
            
           });
            
         
        Route::get('/login',[logincontroller::class,'showlogin'])->name('login');
        Route::post('/login',[logincontroller::class,'login'])->name('post.login');
       
        
       Route::get('/showemail',[restpasswordcontroller::class,'showemailform'])->name('show.email');
       Route::post('/showotp',[restpasswordcontroller::class,'sendotp'])->name('sendotp');

       Route::get('/showotpform/{email}',[restpasswordcontroller::class,'showotpform'])->name('showotpform');
       Route::post('/verfiyotp',[restpasswordcontroller::class,'verfiyotp'])->name('verfiyotp');


       Route::get('/showresetform/{email}',[restpasswordcontroller::class,'showresetform'])->name('showresetform');

       Route::post('/resetpassword',[restpasswordcontroller::class,'resetpassword'])->name('resetpassword');



       
        Route::group(['middleware' => 'auth:admin'],function () {
               Route::post('produect/status',[produectcontroller::class,'status'])->name('produect.status');
        Route::resource('/attribute',AttributeController::class);
        Route::post('produect/image/delete/{id}',[produectcontroller::class,'delete_image'])->name('produect.image.delete');
        Route::post('/submitproduect',[produectcontroller::class,'submit'])->name('produect.submitbroudect');

        Route::post('/validtionstep1',[produectcontroller::class,'validtionstep1'])->name('produect.validtionstep1');
        Route::post('/validtionstep2',[produectcontroller::class,'validtionstep2'])->name('produect.validtionstep2');
        Route::post('/validtionstep3',[produectcontroller::class,'validtionstep3'])->name('produect.validationstep3');
        Route::get('/getallattribute',[AttributeController::class,'getall'])->name('getallattribute');
                    Route::resource('/produect',produectcontroller::class);

            Route::get('/welcome',[indexcontroller::class,'index'])->name('index');
            Route::post('/logout',[logincontroller::class,'logout'])->name('logout');
Route::resource('/Role',Rolecontroller::class);
Route::resource('/Admin',Admincontroller::class);
Route::controller('Admin/changeStatus',[Admincontroller::class,'changeStatus']);

// Route::group(function(){
Route::get('/orderes',[orderController::class,'index']);

Route::get('/ordere_getall',[orderController::class,'getall'])->name('orders.getall');
Route::post('/ordere_delete',[orderController::class,'delete'])->name('orders.delete');



// });


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
Route::resource('/Fqs',Fqscontroller::class);
Route::group(['middleware' => 'can:brands'],function(){
    
    Route::resource('/Brande',Brandeconrtoller::class);
    Route::get('/Brandes-all',[Brandeconrtoller::class,'getall'])->name('brandsgetall');
});

Route::resource('/coupons',Couponsconrtoller::class);
Route::get('/getallcoupons',[Couponsconrtoller::class,'getall'])->name('getallcoupons');


        });

    
    });




  