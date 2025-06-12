@extends('healper.website.app')
@section('body')
<section class="login footer-padding">
    <div class="container">
      <form id="registerForm"  action="{{route('website.register')}}" method="post">
        @csrf
      <div class="login-section">
        <div class="review-form">
          <h5 class="comment-title">Log In</h5>
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <div class="review-inner-form">
            <div class="review-form-name">
              <label for="email" class="form-label">Email Address**</label>
              <input
                type="email"
                id="email"
                class="form-control"
                placeholder="Email"
                name="email"
              />
             
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

            <div class="review-form-name">
              <label for="email" class="form-label">name</label>
              <input
                type="text"
                id="email"
                class="form-control"
                placeholder="Email"
                name="name"
              />
              @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            
          
            @php
                $Governreate=App\Models\Country::get()
            @endphp
            <div class="review-form-name">
              <label for="password" class="form-label">country</label>
              <select id="country" class="form-label" name="country_id">
                <option value="">Select country</option>
                @foreach($Governreate as $government)
                    <option value="{{ $government->id }}">{{ $government->name }}</option>
                @endforeach
            </select>
          
            </div>
           
            @error('country_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
              <div class="review-form-name">
                <label for="password" class="form-label">govement*</label>
                <select   class="form-label" id="govement" name="govement_id">
                    <option value="">Select govement</option>
                </select>
               
              </div>
              @error('govement_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="review-form-name">
                <label for="password" class="form-label">Password*</label>
                <input
                  type="password"
                  id="password"
                  name="password"
                  class="form-control"
                  placeholder="password"
                />
             
              </div>
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
              <div class="review-form-name">
                <label for="password" class="form-label">mobile</label>
                <input
                  type="text"
                  id="mobile"
                  name="mobile"
                  class="form-control"
                  placeholder="mobile"
                />
               
              </div>
              @error('mobile')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            {{-- <div class="review-form-name checkbox">
              <div class="checkbox-item">
                <input type="checkbox" />
                <span class="address"> Remember Me</span>
              </div>
              <div class="forget-pass">
                <p>Forgot password?</p>
              </div>
            </div> --}}
          </div>
          <div class="login-btn text-center">
            <a href="#" class="shop-btn" id="submitForm">Sign Up</a>
            <span class="shop-account"
              >Dont't have an account ?<a href="create-account.html"
                >Sign Up Free</a
              ></span
            >
          </div>
        </div>
      </div>
    </form>
    </div>
  </section>
@endsection
@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
     $('#submitForm').on('click', function (e) {
            e.preventDefault(); // Prevent the default anchor behavior
            $('#registerForm').submit(); // Submit the form
        });
  console.log('kk');
  var lan = "{{ app()->getLocale() }}";
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
                        $('#govement').append('<option value="' + city.id + '">' + cityName + '</option>');
                    });
                }
            });
        } else {
            $('#city').empty().append('<option value="">Select City</option>');
        }
    });
</script>   
@endsection