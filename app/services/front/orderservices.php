<?php

namespace App\services\front;

use App\Models\City;
use App\Models\Country;
use App\Models\Coupons;
use App\Models\Governreate;
use App\Models\Order;
use App\Models\ShappingGovernrate;
use App\Models\Transaction;

class orderservices
{
    /**
     * Create a new class instance.
     */
 public function createTransaction($orderId, $data, $paymentMethod)
{
    $transactionId = null;

    if ($paymentMethod === 'myfatora') {
        $transactionId = $data['Data']['InvoiceId'] ?? null;
    } elseif ($paymentMethod === 'paypal') {
        // PayPal usually returns 'id' as the transaction/order ID
        $transactionId = $data['id'] ?? null;
    }

    Transaction::create([
        'user_id' => auth()->id(),
        'order_id' => $orderId,
        'transaction_id' => $transactionId,
        'payment_method' => $paymentMethod
    ]);
}
    public function __construct()
    {
        //
    }
    public function getInvoicevalue($adress){
       $cart=$this->getcartuser();

if (!$cart) {
    return null;
    # code...
}
 $subtotal= $cart->sum(fn($item)=>$item->price*$item->quantity);
//  dd($adress);
$getshappingprice=$this->getshappingprice($adress);
$copons=$cart->first()?->copons;
if ( $copons !=null) {
    $copon= Coupons::where('code',$copons)->first();
    if ( $copon) {
      $subtotal=$subtotal-($subtotal *$copon->discount_perecentage/ 100);

    }

  
}
$total=$getshappingprice+$subtotal;
return $total;

    }
    public function createorder( $data){
        // dd( $data);
$countryname=$this->getLocationName(Country::class,$data['country_id']);
$governratename=$this->getLocationName(Governreate::class,$data['govement_id']);
$cityename=$this->getLocationName(City::class,$data['city_id']);
if (!$countryname || !$governratename || !$cityename ) {
    return null;
    # code...
}

$cart=$this->getcartuser();
if (!$cart) {
    return false;
    # code...
}

  $subtotal= $cart->sum(fn($item)=>$item->price*$item->quantity);
$getshappingprice=$this->getshappingprice($data['govement_id']);


$copons=$cart->first()?->copons;
if ( $copons !=null) {
    $copon= Coupons::where('code',$copons)->first();
    if ( $copon) {
      $subtotal=$subtotal-($subtotal *$copon->discount_perecentage/ 100);

    }

  
}
$total=$getshappingprice+$subtotal;

 $order=  Order::create([
       'user_id'=>auth()->user()->id,
'user_name'=>$data['first_name'] .$data['last_name'] ,
'user_phone'=>$data['user_phone'],
'user_email'=>$data['user_email'],
'price'=>$subtotal,
'shopping_price'=>$getshappingprice,
'total_price' =>$total,
'note'=>$data['note'],

'country'=>$countryname,
'city'=>$cityename,
'street'=>$data['street'],
'governorate' =>$governratename,
    ]);
    # code...
    foreach ($cart as $item) {
    $item->update(['copons' => null]);
}
    $this->orderitem($order,$cart);
    return $order;


    }
    public function orderitem($order,$cart)
    {

         $firstCartItem = $cart->first();
$variant = $firstCartItem->variant_id 
    ? $firstCartItem->product->variants->where('id', $firstCartItem->variant_id)->first()
    : null;

$attributes = $variant 
    ? $variant->variantAttributes->map(function($attr) {
        return [
            'name' => $attr->attributeValue->attribut->name ?? '',
            'value' => $attr->attributeValue->value ?? '',
        ];
    })->toArray()
    : [];
    $order->orderitems()->create([
        'prodect_id'            => $firstCartItem->product_id,
        'produect_name'          => $firstCartItem->product->name,
        'produevt_variant_id'    => $firstCartItem?->variant_id,
        'produect_desc'          => $firstCartItem->product->small_desc,
        'produect_quantity'      => $firstCartItem->quantity,
        'produect_price'         => $firstCartItem->price,
        'attributes'             => json_encode($attributes),
    ]);
    }
    public function getLocationName( string $model,int $id){
        return $model::find($id)?->name;

    }
    public function getcartuser(){
    return auth()->user()->cart;
}
public function getshappingprice($governrat_id){
return ShappingGovernrate::where('governrate_id',$governrat_id)->first()?->price??0 ; 
}
}
