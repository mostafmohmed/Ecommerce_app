@extends('healper.website.app')
@section('body')
<section class="login footer-padding">
    <div class="container">
      <form id="loginForm"  action="{{route('website.login')}}" method="post">
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
                value="{{old('email')}}"
              />
             
            </div>
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

            <div class="review-form-name">
              <label for="email" class="form-label">password</label>
              <input
                type="password"
                id="email"
                class="form-control"
                placeholder="password"
                name="password"
              />
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            
          
          
        
            <div class="review-form-name checkbox">
              <div class="checkbox-item">
                <input type="checkbox"  name="remember"/>
                <span class="address"> Remember Me</span>
              </div>
              {{-- <div class="forget-pass">
                <p>Forgot password?</p>
              </div> --}}
            </div>
          </div>
          <div class="login-btn text-center">
            <a href="#" class="shop-btn" id="submitlogin">login Up</a>
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
<script>
    $('#submitlogin').on('click', function (e) {
    e.preventDefault(); // Prevent the default anchor behavior
    $('#loginForm').submit(); // Submit the form
}); 
</script>

@endsection