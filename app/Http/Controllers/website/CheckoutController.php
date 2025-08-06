<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use App\Notifications\OrderNotifcation;
use App\services\front\Myyfatoorahservices;
use App\services\front\orderservices;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public $orderservices;
    public $Myyfatoorahservices;
      protected $paypal;

    public function __construct(orderservices $orderservices ,Myyfatoorahservices $Myyfatoorahservices,PayPalService $paypal) {
        $this->orderservices = $orderservices;
        $this->Myyfatoorahservices=$Myyfatoorahservices;
        $this->paypal = $paypal;
    }
    public function show(){
        return 'jjjjjjjjjjjjj';
    }

public function paypalcancel(){
    
}

public function paypalCallback(Request $request)
{
    $token = $request->query('token'); // هذا هو order_id من PayPal
    $payerId = $request->query('PayerID');

    if (!$token || !$payerId) {
        return redirect()->route('website.home')->with('error', 'بيانات الدفع غير صحيحة');
    }

    // تنفيذ الدفع فعليًا
    $response = $this->paypal->capturePayment($token); // تحتاج تعمل هذه الدالة

    if (!empty($response['status']) && $response['status'] == 'COMPLETED') {
        // جلب المعاملة
        $transaction = Transaction::where('transaction_id', $token)->first();
        if (!$transaction) {
            return redirect()->route('website.home')->with('error', 'المعاملة غير موجودة');
        }

        // تحديث حالة الطلب
        $order = Order::find($transaction->order_id);
        if (!$order) {
            return redirect()->route('website.home')->with('error', 'الطلب غير موجود');
        }

        $order->update(['status' => 'complete']);

        // إرسال إشعار كما في MyFatoorah
        $admins = Admin::all();
        foreach ($admins as $admin) {
            $notificationId = (string) Str::uuid();

            $admin->notifications()->create([
                'id' => $notificationId,
                'type' => OrderNotifcation::class,
                'data' => [
                    'order_id' => $order->id,
                    'total_price' => $order->total_price,
                    'user_name' => $order->user_name,
                    'message' => 'طلب جديد من العميل',
                ],
            ]);

            if ($admin->fcm_token) {
                $message = CloudMessage::withTarget('token', $admin->fcm_token)
                    ->withNotification([
                        'title' => 'طلب جديد',
                        'body' => 'من العميل ' . $order->user_name,
                    ])
                    ->withData([
                        'id' => $notificationId,
                        'order_id' => $order->id,
                        'total_price' => $order->total_price,
                        'user_name' => $order->user_name,
                        'message' => 'اشعار جديد'
                    ]);

                Firebase::messaging()->send($message);
            }
        }

        return redirect()->route('website.home')->with('success', 'تم الدفع بنجاح عبر PayPal');
    }

    return redirect()->route('website.home')->with('error', 'فشل عملية الدفع عبر PayPal');
}
























    public function callback(Request $request){
    //    dd('kkkkkk');
        $data=[];
        $data['key']=$request->paymentId;
        $data['keyType']='paymentId';
        $response=   $this->Myyfatoorahservices->getpaymentStatus( $data);
        Transaction::where('transaction_id', $response['Data']['InvoiceId'])->pluck('user_id');
       $order_id=         Transaction::where('transaction_id', $response['Data']['InvoiceId'])->pluck('order_id')->first();
if (strtolower($response['Data']['InvoiceStatus']) == 'paid') {
  Order::where('id',$order_id)->update(['status'=>'complete']);
  $order=Order::find( $order_id);
  $admins=Admin::all();
  foreach( $admins as $admin){
    // $admin->notify(new OrderNotifcation($order));

$notificationId = (string) Str::uuid(); // توليد ID يدوي

    // حفظ الإشعار في جدول notifications
    $admin->notifications()->create([
        'id' => $notificationId,
        'type' => OrderNotifcation::class,
        'data' => [
            'order_id' => $order->id,
            'total_price' => $order->total_price,
            'user_name' => $order->user_name,
            'message' => 'طلب جديد من العميل',
        ],
    ]);
if ($admin->fcm_token) {
        $message = CloudMessage::withTarget('token', $admin->fcm_token)
            ->withNotification([
                'title' => 'طلب جديد',
                'body' => 'من العميل ' . $order->user_name,
            ])
            ->withData([
                'id' => $notificationId, // ← مهم جدًا!
                'order_id' => $order->id,
                'total_price' => $order->total_price,
                'user_name' => $order->user_name,
                'message'=>'اشعار جديد'
            ]);

        Firebase::messaging()->send($message);
    }

  }




//   $tokens = Admin::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
    
//         $messaging = Firebase::messaging();
    
//         foreach ($tokens as $token) {
//             $message = CloudMessage::withTarget('token', $token)
//                 ->withNotification([
//                     'order_id' => $order->id,
//                     'total_price' => $order->total_price,
//                     'user_name'=>$order->user_name,
//                 ]);
    
//             $messaging->send($message);
//         }






         session()->flash('success','تم الدفع بنجاح');

  return redirect()-> route('website.home')->with('success','تم الدفع بنجاح');
}
  return redirect()-> route('website.home')->with('error','فشل عملة الدفع');

         session()->flash('error','فشل عملية الدفع');
    }
    public function create(){
        $cart=auth()->user()->cart;
        return view('website.Checkout',compact('cart'));
    }
    public function store(Request $request){
        // dd($request->govement_id);
        $invoicValue=$this->orderservices->getInvoicevalue($request->govement_id);
            $requestall=$request->all();
        if ( $request->type_payment=='myfatora') {
           $data=[
             "InvoiceValue"=> $invoicValue,
            'CustomerName' =>$request->first_name.' '.$request->first_name,
            "MobileCountryCode"=> "+20",
                    "CustomerEmail" => $request->user_email, 
            "CustomerMobile"=>"1143579457",
                    'NotificationOption' => 'ALL', 
            'CallBackUrl' => route('website.myfatoorah.callback'),
            'ErrorUrl' => route('website.myfatoorah.error'),
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
 
     $order=  $this->orderservices->createorder( $requestall);
       if (!$order) {
       session()->flash('error','the  error in create order');
        return redirect()->back();
       }
       $createtransaction=$this->orderservices->createTransaction( $order->id, $data,'myfatora');
    //    if (! $createtransaction) {
    //       session()->flash('error','the  error in create Transaction');
    //           return redirect()->back();
    //    }
      return redirect($url);
   
 }else{
     session()->flash('error','somsting  went wrong');
              return redirect()->back(); 
 }
        }else{
 $datapaypal = $this->paypal->createOrder( $invoicValue); // $100

        if (!empty($datapaypal['links'])) {
         
     $order=  $this->orderservices->createorder( $requestall);
       if (!$order) {
       session()->flash('error','the  error in create order');
        return redirect()->back();
       }
              $createtransaction=$this->orderservices->createTransaction( $order->id, $datapaypal,'paypal');
            foreach ($datapaypal['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }else{
             session()->flash('error','somsting  went wrong in paypal');
              return redirect()->back(); 
        }

        
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
