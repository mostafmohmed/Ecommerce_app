<?php

namespace App\services\Dashboard;

use App\Models\Order;
use Yajra\DataTables\Facades\DataTables;

class orderservices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getorder($request){
        
          $orders=Order::query();
         if ($request->has('status') && !empty($request->status)) {
            $orders->where('status',$request->status);
         }
        // 
        
        //   return  $orders;
         return DataTables::of( $orders)
        ->addIndexColumn()
      
        
        ->addColumn('actions',function($order ){
            return view('dashboard.order.actions',compact('order')) ;
        })
         ->make(true)
        ;
    }

}
