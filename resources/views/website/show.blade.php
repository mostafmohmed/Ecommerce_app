@extends('healper.website.app')
@section('body')
 <section class="product product-info">
<div class="container">
<div class="blog-bradcrum">
<span><a href="{{route('website.home')}}">Home</a></span>
<span class="devider">/</span>
<span><a href="product-sidebar.html">Shop</a></span>
<span class="devider">/</span>
<span><a href="#">Product Details</a></span>
</div>
 <div class="product-info-section">
<div class="row ">
<div class="col-md-6">
<div class="product-info-img" data-aos="fade-right">
<div class="swiper product-top">
<div class="product-discount-content">
<h4>-50%</h4>
</div>
<div class="swiper-wrapper">
<div class="swiper-slide slider-top-img">
<img src="assets/images/homepage-one/product-img/product-img-14.webp" alt="img">
</div>
<div class="swiper-slide slider-top-img">
<img src="assets/images/homepage-one/product-img/product-slider-img-1.webp" alt="img">
</div>
<div class="swiper-slide slider-top-img">
<img src="assets/images/homepage-one/product-img/product-slider-img-2.webp" alt="img">
</div>
<div class="swiper-slide slider-top-img">
<img src="assets/images/homepage-one/product-img/product-slider-img-3.webp" alt="img">
</div>
<div class="swiper-slide slider-top-img">
<img src="assets/images/homepage-one/product-img/product-slider-img-1.webp" alt="img">
</div>
<div class="swiper-slide slider-top-img">
<img src="assets/images/homepage-one/product-img/product-slider-img-2.webp" alt="img">
</div>
<div class="swiper-slide slider-top-img">
<img src="assets/images/homepage-one/product-img/product-slider-img-3.webp" alt="img">
</div>
<div class="swiper-slide slider-top-img">
<img src="assets/images/homepage-one/product-img/product-slider-img-1.webp" alt="img">
</div>
<div class="swiper-slide slider-top-img">
<img src="assets/images/homepage-one/product-img/product-slider-img-2.webp" alt="img">
</div>
<div class="swiper-slide slider-top-img">
<img src="assets/images/homepage-one/product-img/product-slider-img-3.webp" alt="img">
</div>
</div>
</div>
<div class="swiper product-bottom">
<div class="swiper-wrapper">
<div class="swiper-slide slider-bottom-img">
<img src="assets/images/homepage-one/product-img/product-img-16.png" alt="img">
</div>
<div class="swiper-slide slider-bottom-img">
<img src="assets/images/homepage-one/product-img/product-img-17.png" alt="img">
</div>
<div class="swiper-slide slider-bottom-img">
<img src="assets/images/homepage-one/product-img/product-slider-img-2.webp" alt="img">
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6">
    <div class="product-info-content" data-aos="fade-left">
<span class="wrapper-subtitle">BOY'S FASHION</span>
<h5>Rainbow Sequin Profresonal Coat
</h5>
<div class="ratings">
<span>
<svg width="75" height="15" viewBox="0 0 75 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" fill="#FFA800" />
<path d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z" fill="#FFA800" />
<path d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z" fill="#FFA800" />
<path d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z" fill="#FFA800" />
<path d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z" fill="#FFA800" />
</svg>
</span>
<span class="text">{{$produect->produectperview->count()}} Reviews</span>
</div>
<div class="price">
@if ($produect->has_variants == 0)
    @if ($produect->discount == 0)
        <span class="new-price">{{ $produect->price }}</span> 
    @else
        <span class="price-cut">{{ $produect->price }}</span>
        <span class="new-price">{{ $produect->price - $produect->discount }}</span>
    @endif
@else
    <span class="new-price">has variants</span>
@endif
</div>
<p class="content-paragraph">It is a long established fact that a reader will be distracted
by <span class="inner-text">the readable there content of a page.</span></p>
<hr>
<div class="product-availability">
<span>Availabillity : </span>
<span class="inner-text">132 Products Available</span>
</div>
@if ($produect->has_variants  )
      <div class="product-size">
<P class="size-title"></P>
<div class="size-section">
<span class="size-text">Select your size</span>
<div class="toggle-btn">
<span class="toggle-btn2"></span>
<span class="chevron">
<svg width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.4 6.8L0 1.4L1.4 0L5.4 4L9.4 0L10.8 1.4L5.4 6.8Z" fill="#222222" />
</svg>
</span>
</div>
</div>

    

<ul class="size-option">
    {{-- @foreach ( $produect->variants ->VariantAttributes->attributeValue as $item) --}}
    {{-- {{$produect->variants}} --}}
  @foreach ($produect->variants as $item)
    @foreach ($item->variantAttributes as $attribute)
        <li class="option">
            <span class="option-text">
                <a 
                    href="#"
                    data-price="{{ $item->price }}" 
                    data-variant-id="{{ $item->id }}"
                    class="change_variant">
                    {{ $attribute->attributeValue->attribut->name }}
                </a>
            </span>
            <span class="option-measure">  {{ $attribute->attributeValue->value }}</span>
        </li>
    @endforeach
@endforeach
      
    {{-- @endforeach --}}





</ul>
</div>
@endif


<div class="product-quantity">
  <div class="quantity-wrapper">
    <div class="quantity">
      <span class="minus">-</span>
      <span class="number" data-product-id="{{ $produect->id }}">    {{ auth()->user()->cart()->where('product_id', $produect->id)->first()?->quantity ?? 1 }}  </span>
      <span class="plus">+</span>
    </div>

    <div class="wishlist {{ auth()->user() && auth()->user()->wishlist->contains($produect->id) ? 'active' : '' }}"
         style="cursor:pointer;" data-product-id="{{ $produect->id }}">
      <!-- SVG هنا -->
        <svg xmlns="http://www.w3.org/2000/svg" 
     width="24" height="24" 
     viewBox="0 0 24 24" class="heart-icon">
    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 
             2 6.5 3.5 5 5.5 5 
             c1.54 0 3.04.99 3.57 2.36h1.87
             C13.46 5.99 14.96 5 16.5 5 
             18.5 5 20 6.5 20 8.5
             c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
</svg>
    </div>
  </div>

  <a href="#" class="shop-btn">
    <span>
      <!-- أيقونة -->
    </span>
    <span>
      <button class="add-to-cart-btn"
              data-product-id="{{ $produect->id }}"
              style="cursor:pointer;">
        🛒 أضف إلى السلة
      </button>
    </span>
  </a>
</div>
<hr>
<div class="product-details">
<p class="category">Category : <span class="inner-text">Kitchen</span></p>
<p class="tags">Tags : <span class="inner-text">Beer, Foamer</span></p>
<p class="sku">SKU : <span class="inner-text">KE-91039</span></p>
</div>
<hr>
<div class="product-report">
<a href="#" class="report" onclick="modalAction('.action')">
<span>
<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 0C0.30478 0 0.585152 0 0.897442 0C0.908707 0.197137 0.919972 0.389267 0.932488 0.607056C1.30235 0.482516 1.64781 0.347336 2.00391 0.250332C3.83134 -0.247829 5.5555 0.0450599 7.19017 0.959399C7.97121 1.39686 8.7898 1.71165 9.68599 1.81178C10.9308 1.95072 12.0873 1.6716 13.1813 1.08832C13.4566 0.941876 13.7257 0.783541 14.0443 0.604553C14.0505 0.745991 14.0599 0.853634 14.0599 0.960651C14.0605 3.92396 14.058 6.88665 14.0662 9.84996C14.0668 10.079 13.9961 10.2042 13.7964 10.3143C11.4702 11.5973 9.14277 11.6123 6.82531 10.3106C4.99976 9.28546 3.14292 9.1484 1.22162 10.0164C0.990065 10.1209 0.908081 10.2524 0.909958 10.5096C0.921849 12.21 0.916217 13.911 0.916217 15.6114C0.916217 15.7353 0.916217 15.8586 0.916217 16C0.600172 16 0.312916 16 0 16C0 10.6779 0 5.35336 0 0Z" fill="#EB5757" />
</svg>
</span>
<span>Report This Item</span>
</a>

<div class="modal-wrapper action">
<div onclick="modalAction('.action')" class="anywhere-away"></div>

<div class="login-section account-section modal-main">
<div class="review-form">
<div class="review-content">
<h5 class="comment-title">Report Products</h5>
<div class="close-btn">
<img src="assets/images/homepage-one/close-btn.png" onclick="modalAction('.action')" alt="close-btn">
</div>
</div>
<div class="review-form-name address-form">
<label for="reporttitle" class="form-label">Enter Report Ttile*</label>
<input type="text" id="reporttitle" class="form-control" placeholder="Reports Headline here">
</div>
<div class="review-form-name address-form">
<label for="reportnote" class="form-label">Enter Report Note*</label>
<textarea name="ticketmassage" id="reportnote" cols="40" rows="3" class="form-control" placeholder="Type Here"></textarea>
</div>
<div class="login-btn text-center">
<a href="#" onclick="modalAction('.action')" class="shop-btn">Submit
Report</a>
</div>
</div>
</div>

</div>
</div>
<div class="product-share">
<p>Share This:</p>
<div class="social-icons">
<a href="#">
<span class="facebook">
<svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3 16V9H0V6H3V4C3 1.3 4.7 0 7.1 0C8.3 0 9.2 0.1 9.5 0.1V2.9H7.8C6.5 2.9 6.2 3.5 6.2 4.4V6H10L9 9H6.3V16H3Z" fill="#3E75B2" />
</svg>
</span>
</a>
<a href="#">
<span class="pinterest">
<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8 0C3.6 0 0 3.6 0 8C0 11.4 2.1 14.3 5.1 15.4C5 14.8 5 13.8 5.1 13.1C5.2 12.5 6 9.1 6 9.1C6 9.1 5.8 8.7 5.8 8C5.8 6.9 6.5 6 7.3 6C8 6 8.3 6.5 8.3 7.1C8.3 7.8 7.9 8.8 7.6 9.8C7.4 10.6 8 11.2 8.8 11.2C10.2 11.2 11.3 9.7 11.3 7.5C11.3 5.6 9.9 4.2 8 4.2C5.7 4.2 4.4 5.9 4.4 7.7C4.4 8.4 4.7 9.1 5 9.5C5 9.7 5 9.8 5 9.9C4.9 10.2 4.8 10.7 4.8 10.8C4.8 10.9 4.7 11 4.5 10.9C3.5 10.4 2.9 9 2.9 7.8C2.9 5.3 4.7 3 8.2 3C11 3 13.1 5 13.1 7.6C13.1 10.4 11.4 12.6 8.9 12.6C8.1 12.6 7.3 12.2 7.1 11.7C7.1 11.7 6.7 13.2 6.6 13.6C6.4 14.3 5.9 15.2 5.6 15.7C6.4 15.9 7.2 16 8 16C12.4 16 16 12.4 16 8C16 3.6 12.4 0 8 0Z" fill="#E12828" />
</svg>
</span>
</a>
<a href="#">
<span class="twitter">
<svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.0722 1.60052C16.432 1.88505 15.7562 2.06289 15.0448 2.16959C15.7562 1.74278 16.3253 1.06701 16.5742 0.248969C15.8985 0.640206 15.1515 0.924742 14.3335 1.10258C13.6933 0.426804 12.7686 0 11.7727 0C9.85206 0 8.28711 1.56495 8.28711 3.48557C8.28711 3.7701 8.32268 4.01907 8.39382 4.26804C5.51289 4.12577 2.9165 2.73866 1.17371 0.604639C0.889175 1.13814 0.71134 1.70722 0.71134 2.34742C0.71134 3.5567 1.31598 4.62371 2.27629 5.26392C1.70722 5.22835 1.17371 5.08608 0.675773 4.83711V4.87268C0.675773 6.5799 1.88505 8.00258 3.48557 8.32268C3.20103 8.39382 2.88093 8.42938 2.56082 8.42938C2.34742 8.42938 2.09845 8.39382 1.88505 8.35825C2.34742 9.74536 3.62784 10.7768 5.15722 10.7768C3.94794 11.7015 2.45412 12.2706 0.818041 12.2706C0.533505 12.2706 0.248969 12.2706 0 12.2351C1.56495 13.2309 3.37887 13.8 5.37062 13.8C11.8082 13.8 15.3294 8.46495 15.3294 3.84124C15.3294 3.69897 15.3294 3.52113 15.3294 3.37887C16.0052 2.9165 16.6098 2.31186 17.0722 1.60052Z" fill="#3FD1FF" />
</svg>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="product product-description">
<div class="container">
<div class="product-detail-section">
<nav>
<div class="nav nav-tabs nav-item" id="nav-tab" role="tablist">
<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
<button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews</button>
<button class="nav-link" id="nav-seller-tab" data-bs-toggle="tab" data-bs-target="#nav-seller" type="button" role="tab" aria-controls="nav-seller" aria-selected="false">Seller
Info</button>
</div>
</nav>
<div class="tab-content tab-item" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0" data-aos="fade-up">
<div class="product-intro-section">
<h5 class="intro-heading">Introduction</h5>
<p class="product-details">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
has been the industry's standard dummy text ever since the 1500s, when an unknown
printer took a galley of type and scrambled it to make a type specimen book. It has
survived not only five centuries but also the on leap into electronic typesetting,
remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of
Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop
publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a
type specimen book.
</p>
</div>
<div class="product-feature">
<h5 class="intro-heading">Features :</h5>
<ul>
<li>
<p>slim body with metal cover</p>
</li>
<li>
<p>latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</p>
</li>
<li>
<p>8GB DDR4 RAM and fast 512GB PCIe SSD</p>
</li>
<li>
<p>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with
gesture support</p>
</li>
</ul>
</div>
</div>
<div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0">
<div class="product-review-section" data-aos="fade-up">
<h5 class="intro-heading">Reviews</h5>
<div class="review-wrapper">
<div class="wrapper">
<div class="wrapper-aurthor">
<div class="wrapper-info">
<div class="aurthor-img">
<img src="assets/images/homepage-one/aurthor-img-1.webp" alt="aurthor-img">
</div>
<div class="author-details">
<h5>Sajjad Hossain</h5>
<p>London, UK</p>
</div>
</div>
<div class="ratings">
<span>
<svg width="75" height="15" viewBox="0 0 75 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" fill="#FFA800" />
<path d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z" fill="#FFA800" />
<path d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z" fill="#FFA800" />
<path d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z" fill="#FFA800" />
<path d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z" fill="#FFA800" />
</svg>
</span>
<span>(5.0)</span>
</div>
</div>
<div class="wrapper-description">
<p class="wrapper-details">Lorem Ipsum is simply dummy text of the printing and
typesetting industry. Lorem Ipsum has been the industry's standard dummy
text ever since the redi 1500s, when an unknown printer took a galley of
type and scrambled it to make a type specimen book. It has survived not only
five centuries but also the on leap into electronic typesetting, remaining
</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="product weekly-sale product-weekly footer-padding">
<div class="container">
<div class="section-title">
<h5>Best Sell in this Week</h5>
<a href="#" class="view">View All</a>
</div>
<div class="weekly-sale-section">
<div class="row g-5">
@foreach ($relatiedproduect as $item)
  <div class="col-lg-3 col-md-6">
<div class="product-wrapper" data-aos="fade-up">
<div class="product-img">
<img src="{{asset('uploads/produect/'. $item->images()->first()->file_name)}}" alt="{{$item->images()->first()->file_name}}">
<div class="product-cart-items">
<a href="#" class="cart cart-item">
<span>
<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="40" height="40" rx="20" fill="white" />
<path d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z" fill="#181818" />
<path d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z" fill="black" fill-opacity="0.2" />
<path d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z" fill="#181818" />
<path d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z" fill="black" fill-opacity="0.2" />
<path d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z" fill="#181818" />
<path d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z" fill="black" fill-opacity="0.2" />
<path d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z" fill="#181818" />
<path d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z" fill="black" fill-opacity="0.2" />
</svg>
</span>
</a>
<a href="wishlist.html" class="favourite cart-item">
<span>
<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="40" height="40" rx="20" fill="#AE1C9A" />
<path d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z" fill="#000" />
</svg>
</span>
</a>
<a href="compaire.html" class="compaire cart-item">
<span>
<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="40" height="40" rx="20" fill="white" />
<path d="M18.8948 10.6751C18.8948 11.0444 18.8829 11.3502 18.871 11.3502C18.8591 11.3502 18.6645 11.3859 18.4461 11.4336C14.674 12.1959 11.8588 15.1779 11.3346 18.966C11.2115 19.8316 11.2632 21.1499 11.4498 22.0314C11.9223 24.2867 13.3875 26.4031 15.3252 27.642L15.5515 27.7849L16.1114 27.364C16.4171 27.1337 16.6712 26.9352 16.6712 26.9193C16.6712 26.9074 16.572 26.8439 16.4529 26.7803C15.8453 26.4627 15.0552 25.8274 14.5191 25.2278C13.5026 24.0882 12.8514 22.6984 12.641 21.2372C12.5655 20.6972 12.5655 19.6251 12.641 19.1129C12.8038 18.0289 13.185 17.0044 13.7568 16.1071C14.4715 14.9913 15.5594 14.0145 16.7507 13.4149C17.3542 13.1132 18.192 12.8273 18.7678 12.724L18.8948 12.7002V13.2561C18.8948 13.5618 18.9028 13.812 18.9147 13.812C18.9544 13.812 21.4361 11.9339 21.4361 11.9061C21.4361 11.8783 18.9544 10.0001 18.9147 10.0001C18.9028 10.0001 18.8948 10.3019 18.8948 10.6751Z" fill="#181818" />
<path d="M18.8948 10.6751C18.8948 11.0444 18.8829 11.3502 18.871 11.3502C18.8591 11.3502 18.6645 11.3859 18.4461 11.4336C14.674 12.1959 11.8588 15.1779 11.3346 18.966C11.2115 19.8316 11.2632 21.1499 11.4498 22.0314C11.9223 24.2867 13.3875 26.4031 15.3252 27.642L15.5515 27.7849L16.1114 27.364C16.4171 27.1337 16.6712 26.9352 16.6712 26.9193C16.6712 26.9074 16.572 26.8439 16.4529 26.7803C15.8453 26.4627 15.0552 25.8274 14.5191 25.2278C13.5026 24.0882 12.8514 22.6984 12.641 21.2372C12.5655 20.6972 12.5655 19.6251 12.641 19.1129C12.8038 18.0289 13.185 17.0044 13.7568 16.1071C14.4715 14.9913 15.5594 14.0145 16.7507 13.4149C17.3542 13.1132 18.192 12.8273 18.7678 12.724L18.8948 12.7002V13.2561C18.8948 13.5618 18.9028 13.812 18.9147 13.812C18.9544 13.812 21.4361 11.9339 21.4361 11.9061C21.4361 11.8783 18.9544 10.0001 18.9147 10.0001C18.9028 10.0001 18.8948 10.3019 18.8948 10.6751Z" fill="black" fill-opacity="0.2" />
<path d="M24.219 12.9662C23.9133 13.1965 23.6671 13.399 23.679 13.4149C23.6909 13.4347 23.81 13.5102 23.949 13.5856C25.1124 14.2448 26.1964 15.3566 26.8675 16.5914C27.2725 17.334 27.614 18.414 27.7092 19.2558C27.7887 19.9189 27.741 21.0585 27.614 21.662C27.066 24.2589 25.2593 26.3514 22.7657 27.2806C22.452 27.3957 21.6023 27.63 21.4911 27.63C21.4474 27.63 21.4355 27.5307 21.4355 27.0741C21.4355 26.7684 21.4276 26.5182 21.4157 26.5182C21.376 26.5182 18.8943 28.3963 18.8943 28.4241C18.8943 28.4519 21.376 30.3301 21.4157 30.3301C21.4276 30.3301 21.4355 30.0283 21.4355 29.6551V28.984L21.5864 28.9602C21.9557 28.9006 23 28.6187 23.3415 28.4837C26.4386 27.2726 28.559 24.5884 28.9997 21.3166C29.1149 20.4748 29.0633 19.1565 28.8806 18.2988C28.4081 16.0435 26.9429 13.9271 25.0052 12.6882L24.7789 12.5453L24.219 12.9662Z" fill="#181818" />
<path d="M24.219 12.9662C23.9133 13.1965 23.6671 13.399 23.679 13.4149C23.6909 13.4347 23.81 13.5102 23.949 13.5856C25.1124 14.2448 26.1964 15.3566 26.8675 16.5914C27.2725 17.334 27.614 18.414 27.7092 19.2558C27.7887 19.9189 27.741 21.0585 27.614 21.662C27.066 24.2589 25.2593 26.3514 22.7657 27.2806C22.452 27.3957 21.6023 27.63 21.4911 27.63C21.4474 27.63 21.4355 27.5307 21.4355 27.0741C21.4355 26.7684 21.4276 26.5182 21.4157 26.5182C21.376 26.5182 18.8943 28.3963 18.8943 28.4241C18.8943 28.4519 21.376 30.3301 21.4157 30.3301C21.4276 30.3301 21.4355 30.0283 21.4355 29.6551V28.984L21.5864 28.9602C21.9557 28.9006 23 28.6187 23.3415 28.4837C26.4386 27.2726 28.559 24.5884 28.9997 21.3166C29.1149 20.4748 29.0633 19.1565 28.8806 18.2988C28.4081 16.0435 26.9429 13.9271 25.0052 12.6882L24.7789 12.5453L24.219 12.9662Z" fill="black" fill-opacity="0.2" />
</svg>
</span>
</a>
</div>
</div>
<div class="product-info">
<div class="ratings">
<span>
<svg width="75" height="15" viewBox="0 0 75 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" fill="#FFA800" />
<path d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z" fill="#FFA800" />
<path d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z" fill="#FFA800" />
<path d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z" fill="#FFA800" />
<path d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z" fill="#FFA800" />
</svg>
</span>
</div>
<div class="product-description">
<a href="product-info.html" class="product-details">White Checked Shirt
</a>
<div class="price">
 @if ($item->has_variants == 0)
    @if ($item->discount == 0)
        <span class="new-price">{{ $item->price }}</span> 
    @else
        <span class="price-cut">{{ $item->price }}</span>
        <span class="new-price">{{ $item->price - $item->discount }}</span>
    @endif
@else
    <span class="new-price">has variants</span>
@endif

</div>
</div>
</div>
<div class="product-cart-btn">
<a href="cart.html" class="product-btn"> product details</a>
</div>
</div>
</div> 
  
@endforeach






</div>
</div>
</div>
</section>
@endsection
@section('js')
<script>
 $('.toggle-btn').on('click', function () {
    // عند الضغط على الزر، اعرض أو أخفِ قائمة المقاسات
    $('.size-option').slideToggle(200); // يمكنك استخدام fadeToggle أو toggle فقط حسب الذوق
  });
let selectedVariants = {}; 
$('.change_variant').on('click', function (e) {
  e.preventDefault();
 let price = parseFloat($(this).data('price'));
          $('#product-price').text(price);
  let productId = $('.add-to-cart-btn').data('product-id'); // نفترض منتج واحد للعرض
  let variantId = $(this).data('variant-id');
console.log(variantId);

  selectedVariants[productId] = variantId;
console.log(selectedVariants);
    // let addToCartBtn = $('.add-to-cart-btn[data-product-id="' + productId + '"]');
    // addToCartBtn.attr('data-variant-id', variantId);
    // addToCartBtn.attr('data-price', price);

    // console.log('Selected variant for product ' + productId + ': ' + variantId);

  // تمييز العنصر المختار (اختياري)
  $(this).addClass('selected').closest('.size-option').find('.change_variant').not(this).removeClass('selected');

  console.log("Selected variant: ", variantId);
});






$('.plus').on('click', function () {
    let $number = $(this).siblings('.number');
    let current = parseInt($number.text());
    $number.text(current + 1);
  });

  // تقليل العدد
  $('.minus').on('click', function () {
    let $number = $(this).siblings('.number');
    let current = parseInt($number.text());
    if (current > 1) {
      $number.text(current - 1);
    }
  });



  $('.add-to-cart-btn').on('click', function (e) {
    e.preventDefault();
    
    let productId = $(this).data('product-id');
    let quantity = $('.number[data-product-id="' + productId + '"]').text();
console.log(quantity);
let variantId = selectedVariants[productId] || null;
console.log(variantId);



    $.ajax({
      url: "{{ route('website.cart.add', ':id') }}".replace(':id', productId),
      method: "POST",
      data: { quantity: quantity  ,variant_id: variantId},
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      success: function (response) {
        // alert(response.message || 'تمت الإضافة إلى السلة');
        if (response.status==true) {
            Swal.fire({
  icon: 'success',
  title: 'تمت العملية بنجاح!',
  text: response.message,
  confirmButtonText: 'موافق'
});
   $('#cart-count').text(response.cart_count);
       $('#cart-wrapper').load("{{ route('website.cart.partial') }}"); 
        }
      
     // إذا عندك عداد للسلة
      },
      error: function () {
        alert('حدث خطأ أثناء الإضافة');
      }
    });
  });










    $('.wishlist').on('click', function () {
      var $this = $(this);
      var productId = $this.data('product-id');
      console.log(productId);
      
      var isActive = $this.hasClass('active');

      var method = isActive ? 'DELETE' : 'POST';
      if (isActive) {
        url = "{{ route('website.wishlist.destroy', ':id') }}".replace(':id', productId);
      } else {
        url = "{{ route('website.wishlist.store', ':id') }}".replace(':id', productId);
      }
      

      $.ajax({
        url:url,
        method: method,
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
          if (response.status==true) {
                          $this.toggleClass('active');
          }
         
        
        },
       
      });
    });

    // $('.change_varant').on('click', function() {
       

    // });
        // let discount = parseFloat($(this).data('discount'));

        // if (discount > 0) {
        //     $('#product-price-cut').remove(); // نحذف السعر القديم إن وجد
        //     $('.price').prepend('<span class="price-cut" id="product-price-cut">' + price + '</span>');
        //     $('#product-price').text(price - discount);
        // } else {
            // $('#product-price-cut').remove(); // نحذف القديم
          
        // }

</script>
   
@endsection
