<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  @yield('seo')
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <!-- Material Design Iconic Font-V2.2.0 -->
  <link rel="stylesheet" href="{{asset('styleclient/css/material-design-iconic-font.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('styleclient/css/font-awesome.min.css')}}">
  <!-- Font Awesome Stars-->
  <link rel="stylesheet" href="{{asset('styleclient/css/fontawesome-stars.css')}}">
  <!-- Meanmenu CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/meanmenu.css')}}">
  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/owl.carousel.min.css')}}">
  <!-- Slick Carousel CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/slick.css')}}">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/animate.css')}}">
  <!-- Jquery-ui CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/jquery-ui.min.css')}}">
  <!-- Venobox CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/venobox.css')}}">
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/nice-select.css')}}">
  <!-- Magnific Popup CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/magnific-popup.css')}}">
  <!-- Bootstrap V4.1.3 Fremwork CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/bootstrap.min.css')}}">
  <!-- Helper CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/helper.css')}}">
  <!-- Main Style CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/style.css')}}">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="{{asset('styleclient/css/responsive.css')}}">
  <!-- Modernizr js -->
  <script src="{{asset('styleclient/js/vendor/modernizr-2.8.3.min.js')}}"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <!-- Begin Body Wrapper -->
  <div class="body-wrapper">
    <!-- Begin Header Area -->
    @include('parital.client.headerclient')

    @yield('content')
    <!-- Begin Footer Area -->
    @include('parital.client.footer')
    
  </div>
  
  <!-- Body Wrapper End Here -->
  <!-- jQuery-V1.12.4 -->
  <script src="{{asset('styleclient/js/vendor/jquery-1.12.4.min.js')}}"></script>
  <!-- Popper js -->
  <script src="{{asset('styleclient/js/vendor/popper.min.js')}}"></script>
  <!-- Bootstrap V4.1.3 Fremwork js -->
  <script src="{{asset('styleclient/js/bootstrap.min.js')}}"></script>
  <!-- Ajax Mail js -->
  <script src="{{asset('styleclient/js/ajax-mail.js')}}"></script>
  <!-- Meanmenu js -->
  <script src="{{asset('styleclient/js/jquery.meanmenu.min.js')}}"></script>
  <!-- Wow.min js -->
  <script src="{{asset('styleclient/js/wow.min.js')}}"></script>
  <!-- Slick Carousel js -->
  <script src="{{asset('styleclient/js/slick.min.js')}}"></script>
  <!-- Owl Carousel-2 js -->
  <script src="{{asset('styleclient/js/owl.carousel.min.js')}}"></script>
  <!-- Magnific popup js -->
  <script src="{{asset('styleclient/js/jquery.magnific-popup.min.js')}}"></script>
  <!-- Isotope js -->
  <script src="{{asset('styleclient/js/isotope.pkgd.min.js')}}"></script>
  <!-- Imagesloaded js -->
  <script src="{{asset('styleclient/js/imagesloaded.pkgd.min.js')}}"></script>
  <!-- Mixitup js -->
  <script src="{{asset('styleclient/js/jquery.mixitup.min.js')}}"></script>
  <!-- Countdown -->
  <script src="{{asset('styleclient/js/jquery.countdown.min.js')}}"></script>
  <!-- Counterup -->
  <script src="{{asset('styleclient/js/jquery.counterup.min.js')}}"></script>
  <!-- Waypoints -->
  <script src="{{asset('styleclient/js/waypoints.min.js')}}"></script>
  <!-- Barrating -->
  <script src="{{asset('styleclient/js/jquery.barrating.min.js')}}"></script>
  <!-- Jquery-ui -->
  <script src="{{asset('styleclient/js/jquery-ui.min.js')}}"></script>
  <!-- Venobox -->
  <script src="{{asset('styleclient/js/venobox.min.js')}}"></script>
  <!-- Nice Select js -->
  <script src="{{asset('styleclient/js/jquery.nice-select.min.js')}}"></script>
  <!-- ScrollUp js -->
  <script src="{{asset('styleclient/js/scrollUp.min.js')}}"></script>
  <!-- Main/Activator js -->
  <script src="{{asset('styleclient/js/main.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  @yield('js')
</body>

<!-- index30:23-->

</html>