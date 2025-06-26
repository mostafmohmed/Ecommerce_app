<a href="#" class="shop-btn">Enter Coupon Code</a>
<div class="account-section billing-section">
<h5 class="wrapper-heading">Order Summary</h5>
<div class="order-summery">
<div class="subtotal product-total">
<h5 class="wrapper-heading">PRODUCT</h5>
<h5 class="wrapper-heading">TOTAL</h5>
</div>
<hr>
<div class="subtotal product-total">
<ul class="product-list">

@foreach ($cart as $item)
  <li>
<div class="product-info">
<h5 class="wrapper-heading">{{$item->product->name }}</h5>
@php
  $variantattribute=    \App\Models\VariantAttribute::where('product_variant_id',$item->variant_id)->get();
@endphp
@foreach ($variantattribute as $attr)
    <p class="paragraph">{{ $attr->attributeValue->value}}, {{ $attr->attributeValue->attribut->name}}</p>
@endforeach  

</div>
<div class="price">
<h5 class="wrapper-heading">{{$item->price }}</h5>
</div>
</li>  
@endforeach

</ul>
</div>
<hr>
<div class="subtotal product-total">
<h5 class="wrapper-heading">SUBTOTAL</h5>
<h5 class="wrapper-heading"  id="subtotal-price">{{$cart->sum('price')}}</h5>
</div>
<div class="subtotal product-total">
<ul class="product-list">
<li>
<div class="product-info">
<p class="paragraph">SHIPPING</p>
<h5 class="wrapper-heading">Free Shipping</h5>
</div>
<div class="price">
<h5 class="wrapper-headings">+$0</h5>
</div>
</li>
</ul>
</div>
<hr>
<div class="subtotal total">
<h5 class="wrapper-heading">TOTAL</h5>
<h5 class="wrapper-heading price" id="total-price"></h5>
</div>
<div class="subtotal payment-type">

@php
    $hasCoupon = auth()->user()->cart->contains(fn($item) => $item->copons !== null);
    if ($hasCoupon) {
        $couponCode = auth()->user()->cart->whereNotNull('copons')->pluck('copons')->first();
     $copon=  App\Models\Coupons::where('code', $couponCode)->first();
    }
@endphp
@if ($hasCoupon and $cart->count()>0 )
  <div class="alert alert-danger mt-3 massage-alert my-div"  role="alert">
   copon will Applay with Discount{{  $copon->discount_perecentage}} 
</div>  
@endif


 @if ($cart->count()>0 and !$hasCoupon )
    <div class="checkbox-item">
<div class="review-form">
    <div class=" account-inner-form">
  
<div class="review-form-name">
<label for="fname" class="form-label">First Name*</label>
<input type="text"  id="copon_add" class="form-control" placeholder="First Name">
</div>


</div> 
</div>
</div>  
 


<p></p>

</div>
<a  class="shop-btn copon-add">Apply</a>
 @endif
</div>
</div>