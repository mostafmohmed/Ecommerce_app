<?php

namespace App\services\Dashboard;

use App\Repositories\Dashboard\couponsRepositories;
use Yajra\DataTables\Facades\DataTables;
class couponsservices
{
    /**
     * Create a new class instance.
     */

     public $couponsRepositories;
    public function __construct(couponsRepositories $couponsRepositories)
    {
        $this
        ->couponsRepositories= $couponsRepositories;
    }
    public function couponById($id){
      return $this->couponsRepositories->couponById($id);
    }
    public function create($request){
 
      return  $this->couponsRepositories->create($request);
    }
    public function deletecoupon($id){
   $coupon=   $this->couponsRepositories->couponById($id);
   
      return  $this->couponsRepositories->deletecoupon( $coupon);
    }

    public function updatecoupon($id,$request){
      $coupon=   $this->couponsRepositories->couponById($id);
      
      return     $this->couponsRepositories->updatecoupon($coupon,$request);
        
           }
    // public function update($request){
 
    //   return  $this->couponsRepositories->($request);
    // }

 
}
