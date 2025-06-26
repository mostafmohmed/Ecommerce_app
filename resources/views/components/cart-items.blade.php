@php

if(auth()->check()){
               $carts=auth()->user()->cart ;
$sum = 0;

foreach ($carts as $item) {
    $sum += $item->price  * $item->quantity;
}
}
            @endphp
            
        @isset($carts)
            
        
         
           @foreach ($carts as $item)
                <div class="wrapper">
        <div class="wrapper-item">
        <div class="wrapper-img">
        <img src="assets/images/homepage-one/product-img/product-img-1.webp" alt="img">
        </div>
        <div class="wrapper-content">
        <h5 class="wrapper-title">{{$item->price}}</h5>
        <div class="price">
        <p class="new-price">{{$item->product->name}}</p>
        </div>
        </div>
        </div>
       <span class="close-btn delete_cart" data-cart="{{ $item->id }}">
    <svg viewBox="0 0 10 10" fill="none" class="fill-current" xmlns="http://www.w3.org/2000/svg">
        <path d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"></path>
    </svg>
</span>
        </div> 
           @endforeach
                   @endisset  
                 
