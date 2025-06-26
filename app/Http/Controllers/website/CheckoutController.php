<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use App\services\front\Myyfatoorahservices;
use App\services\front\orderservices;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public $orderservices;
    public $Myyfatoorahservices;
    public function __construct(orderservices $orderservices ,Myyfatoorahservices $Myyfatoorahservices) {
        $this->orderservices = $orderservices;
        $this->Myyfatoorahservices=$Myyfatoorahservices;
    }
    public function callback(Request $request){
        $data=[];
        $data['key']=$request->paymentId;
        $data['keyType']='paymentId';
        $response=   $this->Myyfatoorahservices->getpaymentStatus( $data);
        Transaction::where('transaction_id', $response['Data']['InvoiceId'])->pluck('user_id');
       $order_id=         Transaction::where('transaction_id', $response['Data']['InvoiceId'])->pluck('order_id');
if ($response['Data']['InvoiceStatus']=='paid') {
  Order::where('id',$order_id)->update(['status'=>'paid']);
         session()->flash('success','تم الدفع بنجاح');

  return redirect()->back();
}
         session()->flash('error','فشل عملية الدفع');
    }
    public function create(){
        $cart=auth()->user()->cart;
        return view('website.Checkout',compact('cart'));
    }
    public function store(Request $request){
        $invoicValue=$this->orderservices->getInvoicevalue($request->govement_id);
        $data=[
             "InvoiceValue"=>100,
            'CustomerName' =>$request->first_name.' '.$request->first_name,
            "MobileCountryCode"=> "+20",
                    "CustomerEmail" => $request->user_email, 
            "CustomerMobile"=>"1143579457",
                    'NotificationOption' => 'ALL', 
            'CallBackUrl' => route('myfatoorah.callback'),
            'ErrorUrl' => route('myfatoorah.error'),
            'Language' => app()->getLocale()=='ar'?'ar':'en',
           'InvoiceItems' => [
    [
        'ItemName' => 'Test Product',
        'Quantity' => 1,
        'UnitPrice' => 100
    ]
],
];
 $data= $this->Myyfatoorahservices->checkout($data);
 if (  $url= $data['Data']['InvoiceURL']) {
     $request=$request->all();
     $order=  $this->orderservices->createorder( $request);
       if (!$order) {
       session()->flash('error','the  error in create order');
        return redirect()->back();
       }
       $createtransaction=$this->orderservices->createTransaction( $order->id, $data);
       if (! $createtransaction) {
          session()->flash('error','the  error in create Transaction');
              return redirect()->back();
       }
      return redirect($url);
   
 }else{
     session()->flash('error','somsting  went wrong');
              return redirect()->back(); 
 }
    //     $request=$request->all();
    //    $order=  $this->orderservices->createorder( $request);
    //    if ($order) {
    //    session()->flash('success','the sucess massage');
    //     return redirect()->back();
    //    }
    //    session()->flash('error','the sucess massage');
    //     return redirect()->back();
    }
    public function clearcart( Cart $cart){
        $cart->delete();

    }
}
