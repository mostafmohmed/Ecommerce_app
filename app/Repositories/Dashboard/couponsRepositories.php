<?php

namespace App\Repositories\Dashboard;

use App\Models\Coupons;

class couponsRepositories
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function create($request){
$coupons=Coupons::create($request);
return $coupons;
    }
    public function couponById($id){
        $coupons=Coupons::find($id);
return $coupons;
    }
    public function update(  $coupons, $request){
        $coupons=$coupons->update($request);
return $coupons;
    }
    public function getcoupons(){
       $coupons=Coupons::latest()->get();
       return  $coupons;
    }
    public function deletecoupon($model){
 return $model->delete();
    }
    public function updatecoupon($model,$request){
        return $model->update($request->all());
           }


}
