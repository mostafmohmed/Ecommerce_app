@include('healper.dash.auth.header')
<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="modern admin logo" src="{{asset('dash')}}/app-assets/images/logo/logo.png">
              <h3 class="brand-text">Modern Admin</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container">
        <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="index.html"><i class="ficon ft-arrow-left"></i></a></li>
            <li class="dropdown nav-item">
              <a class="nav-link mr-2 nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-settings"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 @yield('body')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  


  @include('healper.dash.auth.footer')


  <!-- BEGIN VENDOR JS-->
  @include('healper.dash.auth.script')
  <!-- END PAGE LEVEL JS-->
  {!! NoCaptcha::renderJs() !!}
</body>
</html>