<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\services\Dashboard\orderservices;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public $orderservices;
    public function __construct(orderservices $orderservices){
        $this->orderservices=$orderservices;
    }
    public function delete( Request $request){
       
    $order = Order::find($request->id);

    if (!$order) {
        return response()->json([
            'message' => 'Order not found',
            'status' => false
        ]);
    }

    $order->delete();

    return response()->json([
        'message' => 'Success process',
        'status' => true
    ]);

    }
    public function index(){
        return view('dashboard.order.index');
    }
    public function getall(Request $request){

         return $this->orderservices->getorder($request);
    }
}
