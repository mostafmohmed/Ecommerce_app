@extends('healper.website.app')
@section('body')
<section class="blog about-blog">
<div class="container">
<div class="blog-bradcrum">
<span><a href="index-2.html">Home</a></span>
<span class="devider">/</span>
<span><a href="#">Checkout</a></span>
</div>
<div class="blog-heading about-heading">
<h1 class="heading">Checkout</h1>
</div>
</div>
</section>


<section class="checkout product footer-padding">
<div class="container">
<div class="checkout-section">
<div class="row gy-5">
<div class="col-lg-6">
<div class="checkout-wrapper">
<a href="login.html" class="shop-btn">Log into Your Account</a>
<div class="account-section billing-section">
<h5 class="wrapper-heading">Billing Details</h5>

<form action="{{route('website.checkout.store')}}" method="post">
    @csrf
<div class="review-form">
<div class=" account-inner-form">
<div class="review-form-name">
<label for="fname" class="form-label">First Name*</label>
<input type="text" id="fname" name="first_name" class="form-control" placeholder="First Name">
</div>
<div class="review-form-name">
<label for="lname" class="form-label">Last Name*</label>
<input type="text" id="lname" name="last_name" class="form-control" placeholder="Last Name">
</div>
</div>
<div class=" account-inner-form">
<div class="review-form-name">
<label for="email" class="form-label">Email*</label>
<input type="email" id="email" name="user_email" class="form-control" placeholder="user@gmail.com">
</div>
<div class="review-form-name">
<label for="phone" class="form-label">Phone*</label>
<input type="tel" id="phone" name="user_phone" class="form-control" placeholder="+880388**0899">
</div>
<div class="review-form-name">
<label for="phone" class="form-label">street</label>
<input type="tel" id="phone" name="street" class="form-control" placeholder="+880388**0899">
</div>
<div class="review-form-name">
<label for="phone" class="form-label">notes</label>
<input type="tel" name="note" id="phone" name="" class="form-control" placeholder="+880388**0899">
</div>
</div>
 @php
                $country=App\Models\Country::get()
            @endphp
            <div class="review-form-name">
              <label for="password" class="form-label">country</label>
              <select id="country" class="form-label" name="country_id">
                <option value="">Select country</option>
                @foreach($country as $countrys)
                    <option value="{{ $countrys->id }}">{{ $countrys->name }}</option>
                @endforeach
            </select>
          
            </div>

<div class=" account-inner-form city-inner-form">
 <div class="review-form-name">
                <label for="password" class="form-label">govement*</label>
                <select   class="form-label" id="govement" name="govement_id">
                    <option value="">Select govement</option>
                </select>
               
              </div>


               <div class="review-form-name">
                <label for="password" class="form-label">city*</label>
                <select   class="form-label" id="city" name="city_id">
                    <option value="">Select city</option>
                </select>
               
              </div>
              
              


</div>
<div class="review-form-name checkbox">
<div class="checkbox-item">
<input type="checkbox" id="account">
<label for="account" class="form-label">
Create an account?</label>
</div>
</div>
<div class="review-form-name shipping">
<h5 class="wrapper-heading">Shipping Address</h5>
<div class="checkbox-item">
<input type="checkbox" id="remember">
<label for="remember" class="form-label">
Create an account?</label>
</div>
</div>
</div>
<div class=" account-inner-form">
  <div class="review-form-name">
      <button type="submit">Submit</button></div>  
</div> 
</form>

</div>

</div>


</div>
<div class="col-lg-6">
<div class="checkout-wrapper" id="order-summary">

@include('components.order_summary')
</div>
</div>
</div>
</div>
</div>
</section>
    @endsection
    @section('js')
    <script>



  $('.copon-add').on('click', function () {
   var copon= $('#copon_add').val();
   
   
 $.ajax({
        url: "{{ route('website.copon.add') }}",
        method: 'POST',
          data: { copon: copon},
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
          alert(response.massage);
            if (response.status == false) {
                  Swal.fire({
        icon: 'error',
        title: 'حدث خطأ!',
        text: response.massage,
        confirmButtonText: 'حسناً'
    });
            }else{
             
                 $('#order-summary').load("{{ route('website.order_summary') }}");
                 $('.my-div').show().text(response.massage);;
            }
        }
        
    });

  })











        let lan = '{{ app()->getLocale() }}'; 
          $('#country').on('change', function () {
        var govId = $(this).val();
console.log(govId);
console.log('jj');


        if (govId) {
            $.ajax({
                url:"{{route('website.city',':id')}}".replace(':id',govId),
                type: 'GET',
               
                success: function (data) {
                  console.log(data.cities);
                
                    $('#govement').empty().append('<option value="">Select govement</option>');
                    $.each(data.cities, function (key, city) {
                      var cityName = lan === 'en' ? city.name.en : city.name.ar;
                      console.log(cityName);
                      
                        $('#govement').append('<option value="' + city.id + '">' + cityName + '</option>');
                    });
                }
            });
        } else {
            $('#city').empty().append('<option value="">Select City</option>');
        }
    });
















           $('#govement').on('change', function () {
        var govId = $(this).val();
console.log(govId);
console.log('jj');


        if (govId) {
            $.ajax({
                url:"{{route('website.governreate',':id')}}".replace(':id',govId),
                type: 'GET',
               
                success: function (data) {
                
                    $('.wrapper-headings').text('$'+data.price);

                let subtotal = parseFloat($('#subtotal-price').text());
                let shipping = parseFloat(data.price);
                let total = subtotal + shipping;

                $('#total-price').text('$' + total.toFixed(2));

                  console.log(data.cities);
                
                    $('#city').empty().append('<option value="">Select city</option>');
                    $.each(data.cities, function (key, city) {
                      var cityName = lan === 'en' ? city.name.en : city.name.ar;
                      console.log(cityName);
                      
                        $('#city').append(`<option value="${city.id}">${cityName}</option>`);
                    });
                }
            });
        } else {
            $('#city').empty().append('<option value="">Select City</option>');
        }
    });











     $(document).on('click', '.delete_cart', function () {
    var $this = $(this);
    var cart = $this.data('cart'); // ✅ التصحيح هنا

    $.ajax({
        url: "{{ route('website.cart.delete', ':id') }}".replace(':id', cart),
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            if (response.status == true) {
                $('#order-summary').load("{{ route('website.order_summary') }}");
                $('#cart-wrapper').load("{{ route('website.cart.partial') }}");
            }
        }
        
    });
});
    </script>
    @endsection

                    
                      
                        
 

                        
                        
                     
                