<?php

use App\Events\NewMessage;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\Brandeconrtoller;
use App\Http\Controllers\firebaseController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\rwebsite\WishlistController;
use App\Http\Controllers\website\BrandController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\categoryController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\website\contactController;
use App\Http\Controllers\website\FqsController;
use App\Http\Controllers\website\homecontroller;
use App\Http\Controllers\website\ProduectController;
use App\Http\Controllers\website\profileController;
use App\Livewire\Counter;
use App\Livewire\Wishlist;
use App\Models\City;
use App\Models\Governreate;
use App\Models\Role;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//https://apitest.myfatoorah.com/v2/SendPayment
//Authorization": "Bearer {Token}" 
//rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL

// {
//   "CustomerName": "name",
//   "NotificationOption": "ALL",
//   "MobileCountryCode": "965",
//   "CustomerMobile": "12345678",
//   "CustomerEmail": "mail@company.com",
//   "InvoiceValue": 100,
//   "DisplayCurrencyIso": "kwd",
//   "CallBackUrl": "https://yoursite.com/success",
//   "ErrorUrl": "https://yoursite.com/error",
//   "Language": "en",
//   "CustomerReference": "noshipping-nosupplier",
//   "CustomerAddress": {
//     "Block": "string",
//     "Street": "string",
//     "HouseBuildingNo": "string",
//     "Address": "address",
//     "AddressInstructions": "string"
//   },
//   "InvoiceItems": [
//     {
//       "ItemName": "string",
//       "Quantity": 20,
//       "UnitPrice": 5
//     }
//   ]
// }
// Route::get('/', function () {
//     return '✅ Laravel Works';
// });
 // 👈 أضف هذا السطر هنا

Route::get('/firebase/index', [firebaseController::class, 'index'])->name('firebase.index');

Route::get('/paypal/create', [PayPalController::class, 'createOrder'])->name('paypal.create');
Route::get('/paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
Route::get('/paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
Route::get('/test', function () {
    $response=Http::withHeaders(['Authorization'=>'Bearer rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL'])->
    timeout(10)->withoutVerifying()->send('POST','https://apitest.myfatoorah.com/v2/SendPayment',[
        'json'=> [
             "InvoiceValue"=>100,
            'CustomerName' =>'jhjgh',
            "MobileCountryCode"=> "+20",
                    "CustomerEmail" => 'test@example.com', 
            "CustomerMobile"=>"1143579457",
                    'NotificationOption' => 'ALL', 
            'CallBackUrl' => route('myfatoorah.callback'),
            'ErrorUrl' => route('myfatoorah.error'),
            'Language' => 'en',
           'InvoiceItems' => [
    [
        'ItemName' => 'Test Product',
        'Quantity' => 1,
        'UnitPrice' => 100
    ]
],
            ]
        ]);
   if ($response->successful()) {
        $data = $response->json();
        if (isset($data['Data']['InvoiceURL'])) {
            return redirect($data['Data']['InvoiceURL']);
        } else {
            return 'InvoiceURL not found in response.';
        }
    } else {
        // تسجيل الخطأ للاستكشاف
        Log::error('MyFatoorah error: '.$response->body());
        return 'Error: ' . $response->body();
    }

});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() .'/website',
        'as'=>'website.',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //

        // Route::get('/counter', Counter::class);
        Route::middleware(['checkuser'])->group(function () {
            Livewire::setUpdateRoute(function($handle){return Route::post('/livewire/update',$handle);});

            Route::get('/test-broadcast', function () {
 event(new NewMessage("رسالة جديدة من Laravel!"));
return 'dddd';
});
            Route::get('/reviews/component/{id}', function ($id) {
    $product = \App\Models\Broduct::with('produectperview.user')->findOrFail($id);
    return view('components.product-reviews', compact('product'));
})->name('reviews.component');
Route::post('/review',[profileController::class,'reviewstore'])->name('review.store');
Route::put('/review/{id}',[profileController::class,'reviewupdate'])->name('review.update');


            Route::delete('/wishlist',[WishlistController::class,'destroy'])->name('wishlist.destroy');

            Route::post('/profile/change-password', [profileController::class, 'changePassword'])->name('profile.change-password');

Route::get('/userprofile',[profileController::class,'index'])->name('user.profile');
Route::get('/userorders',[profileController::class,'getUserOrders'])->name('user.orders');

Route::get('/user-section/{section}',[profileController::class,'usersections'])->name('user_section');



   Route::get('/cities/{id}',function($id){
           $city= Governreate::where('country_id',$id)->get();
            return response()->json(['status'=>true,'cities'=> $city]);
        })->name('city');
Route::get('/callback',[CheckoutController::class,'callback'])->name('myfatoorah.callback');
Route::get('/ErrorUrl',[CheckoutController::class,'error'])->name('myfatoorah.error');

        Route::get('/Governreate/{id}',function($id){
           $city= City::where('governreate_id',$id)->get();
          $Governreate= Governreate::with('shippingPrice')->find($id);
           
            return response()->json(['status'=>true,'cities'=> $city,'price'=>  $Governreate->shippingPrice->price]);
        })->name('governreate');
        
        Route::get('/home',[homecontroller::class,'home'])->name('home');
        Route::prefix('/category')->name('categories.')->controller(categoryController::class)->group(function(){
  Route::get('/categories','categoriesall')->name('all');
   Route::get('/proudects/{slug}','getproudectsBycategory')->name('getproudectsBycategory');
        });
          Route::prefix('/brande')->name('brandes.')->controller(BrandController::class)->group(function(){
  Route::get('/brandes','brandeAll')->name('all');
   Route::get('/proudects/{slug}','getproudectsByBrand')->name('getproudectsBybrande');
        });
        
         Route::get('/cart/partial', function () {
    return view('components.cart-items');
})->name('cart.partial');
Route::get('/order_summary',function(){
        $cart = auth()->user()->cart; 
    return view('components.order_summary',compact('cart'));
})->name('order_summary');






        Route::post('contact/validtion',[contactController::class,'validtion'])->name('contact.validtion');

        Route::post('contact/store',[contactController::class,'store'])->name('contact.store');
        Route::get('contact/create',[contactController::class,'create'])->name('contact.create');




        Route::get('brande/{slug}/proudects',[homecontroller::class,'getproduectsbybrande'])->name('brande.proudects');
Route::get('/fqs',[FqsController::class,'getfqs'])->name('fqs.home');
Route::post('/sendquestion',[FqsController::class,'sendquestions'])->name('fqs.sendquestions');
Route::post('/cart/update-ajax', [CartController::class, 'updateAjax'])->name('cart.update');

Route::get('/cart',[CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/copon', [CartController::class, 'coponadd'])->name('copon.add');

  Route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlist.index');

  Route::post('/wishlist/{id}', [WishlistController::class, 'store'])->name('wishlist.store');
Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
Route::get('/produect-view-all/{type}',[ProduectController::class,'prodectype'])->name('produect.type');  
Route::get('/produect/{slug}',[ProduectController::class,'showproduect'])->name('produect');    
Route::get('/checkout',[CheckoutController::class,'create'])->name('checkout.create')  ;
Route::get('/payment/paypal/callback',[CheckoutController::class,'paypalCallback'])->name('paypal.callback')  ;
Route::get('/payment/paypal/cancel',[CheckoutController::class,'paypalcancel'])->name('paypal.cancel')  ;



Route::post('/checkout',[CheckoutController::class,'store'])->name('checkout.store')  ;
Route::get('/order_sshow ',[CheckoutController::class,'show'])->name('order.show')  ;

        });
     

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


 