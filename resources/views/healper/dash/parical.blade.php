<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
@include('healper.dash.head')
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->
  @include('healper.dash.navbar')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('healper.dash.sidbar')
  @yield('content')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
 


  @include('healper.dash.footer')



  <!-- BEGIN VENDOR JS-->
  {{-- @vite(['resources/js/app.js']) --}}
  @include('healper.dash.script')
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
</body>
</html>