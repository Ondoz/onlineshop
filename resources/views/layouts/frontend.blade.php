<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Beli Bawi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/assets')}}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/assets')}}/css/animate.css">

    <link rel="stylesheet" href="{{asset('/assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/assets')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('/assets')}}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{asset('/assets')}}/css/aos.css">

    <link rel="stylesheet" href="{{asset('/assets')}}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset('/assets')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('/assets')}}/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{asset('/assets')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('/assets')}}/css/icomoon.css">
    <link rel="stylesheet" href="{{asset('/assets')}}/css/style.css">
  </head>
  <body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{url('/')}}">Winkel</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	        <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                       @auth
                            <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{url('shop')}}">Shop</a>
                                <a class="dropdown-item" href="product-single.html">Single Product</a>
                                <a class="dropdown-item" href="{{url('cart') }}">Cart</a>
                                <a class="dropdown-item" href="">Checkout</a>
                            </div>
                            </li>
                            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                            <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                            <li class="nav-item cta cta-colored">
                                    <a href="{{route('cart.index')}}"class="nav-link"><span class="icon-shopping_cart">{{Cart::instance('default')->count()}}
                                        </span>
                                    </a>
                                    {{-- @if (Cart::instance('default')->count() > 0)
                                    @endif
                                    <span>{{Cart::instance('default')->count()}}</span> --}}
                                </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04">
                                    <a class="dropdown-item" href="{{url('shop')}}">Shop</a>
                                    <a class="dropdown-item" href="product-single.html">Single Product</a>
                                    <a class="dropdown-item" href="{{url('cart') }}">Cart</a>
                                    <a class="dropdown-item" href="checkout.html">Checkout</a>
                                </div>
                                </li>
                                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                                <li class="nav-item cta cta-colored">
                                    <a href="{{route('cart.index')}}"class="nav-link"><span class="icon-shopping_cart">{{Cart::instance('default')->count()}}
                                        </span>
                                    </a>
                                    {{-- @if (Cart::instance('default')->count() > 0)
                                    @endif
                                    <span>{{Cart::instance('default')->count()}}</span> --}}
                                </li>
                                <li class="nav-item active"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item active"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
	        </div>
	    </div>
	</nav>
    <!-- END nav -->
    @yield('content')

    <footer class="ftco-footer bg-light ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Winkel</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Shop</a></li>
                        <li><a href="#" class="py-2 d-block">About</a></li>
                        <li><a href="#" class="py-2 d-block">Journal</a></li>
                        <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Help</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                            <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                            <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQs</a></li>
                            <li><a href="#" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('/assets')}}/js/jquery.min.js"></script>
  <script src="{{asset('/assets')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{asset('/assets')}}/js/popper.min.js"></script>
  <script src="{{asset('/assets')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('/assets')}}/js/jquery.easing.1.3.js"></script>
  <script src="{{asset('/assets')}}/js/jquery.waypoints.min.js"></script>
  <script src="{{asset('/assets')}}/js/jquery.stellar.min.js"></script>
  <script src="{{asset('/assets')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('/assets')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('/assets')}}/js/aos.js"></script>
  <script src="{{asset('/assets')}}/js/jquery.animateNumber.min.js"></script>
  <script src="{{asset('/assets')}}/js/bootstrap-datepicker.js"></script>
  <script src="{{asset('/assets')}}/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('/assets')}}/js/google-map.js"></script>
  <script src="{{asset('/assets')}}/js/main.js"></script>
  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){

		        // Stop acting like a button@extends('admin.layouts.footer')
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            $('#quantity').val(quantity + 1);


		            // Increment

		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });

		});
    </script>
    @yield('js')
  </body>
</html>
