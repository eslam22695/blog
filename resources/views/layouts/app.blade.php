<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Blog</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon -->		
		<link rel="shortcut icon" type="image/x-icon" href="">

		<!-- all css here -->

		<!-- bootstrap v3.3.6 css -->
		<link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css')}}">
		<!-- owl.carousel css -->
		<link rel="stylesheet" href="{{asset('front_assets/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('front_assets/css/owl.transitions.css')}}">
        <!-- meanmenu css -->
        <link rel="stylesheet" href="{{asset('front_assets/css/meanmenu.min.css')}}">
		<!-- font-awesome css -->
		<link rel="stylesheet" href="{{asset('front_assets/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('front_assets/css/icon.css')}}">
		<link rel="stylesheet" href="{{asset('front_assets/css/flaticon.css')}}">
		<!-- magnific css -->
        <link rel="stylesheet" href="{{asset('front_assets/css/magnific.min.css')}}">
		<!-- venobox css -->
		<link rel="stylesheet" href="{{asset('front_assets/css/venobox.css')}}">
		<!-- style css -->
		<link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
		<!-- responsive css -->
		<link rel="stylesheet" href="{{asset('front_assets/css/responsive.css')}}">

		<!-- modernizr css -->
		<script src="{{asset('front_assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
	</head>
		<body>

		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

        <div id="preloader"></div>
        <header class="header-one">
          <!-- header-area start -->
            <div id="sticker" class="header-area hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            <!-- mainmenu start -->
                            <nav class="navbar navbar-default">
                                <div class="collapse navbar-collapse" id="navbar-example">
                                    <div class="main-menu">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="{{url('/')}}">Home</a></li>
                                            
                                            @if (Auth::guard('admin')->check())
                                            <li><a href="{{url('admin/home')}}">Dashboard</a></li>
                                            <li><a href="{{url('admin/home')}}">{{Auth::guard('admin')->user()->name}}</a></li>
                                            @elseif(Auth::guard('web')->check())
                                            <li><a href="#">logout</a></li>
                                            <li><a href="">{{Auth::guard('web')->user()->name}}</a></li>
                                            @else
                                            <li><a href="#">Sign Up</a></li>
                                            <li><a href="#">Sign In</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!-- mainmenu end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-area end -->
            <!-- mobile-menu-area start -->
            <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        
                                        @if (Auth::guard('admin')->check())
                                        <li><a href="{{url('admin/home')}}">Dashboard</a></li>
                                        @elseif(Auth::guard('web')->check())
                                        <li><a href="#">logout</a></li>
                                        @else
                                        <li><a href="#">Sign Up</a></li>
                                        <li><a href="#">Sign In</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>					
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area end -->		
        </header>
        <!-- header end -->

        <div class="layer-drop"></div>

        @yield('content')
        
        
        

        <!--Start Footer Area-->
        <footer class="footer-1">
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="copyright">
                                <p>
                                    Copyright © 2018
                                    <a href="#">Momentum</a> All Rights Reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
		
		<!-- all js here -->

		<!-- jquery latest version -->
		<script src="{{asset('front_assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
		<!-- bootstrap js -->
		<script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
		<!-- owl.carousel js -->
		<script src="{{asset('front_assets/js/owl.carousel.min.js')}}"></script>
		<!-- Counter js -->
		<script src="{{asset('front_assets/js/jquery.counterup.min.js')}}"></script>
		<!-- waypoint js -->
		<script src="{{asset('front_assets/js/waypoints.js')}}"></script>
		<!-- isotope js -->
        <script src="{{asset('front_assets/js/isotope.pkgd.min.js')}}"></script>
        <!-- stellar js -->
        <script src="{{asset('front_assets/js/jquery.stellar.min.js')}}"></script>
		<!-- magnific js -->
        <script src="{{asset('front_assets/js/magnific.min.js')}}"></script>
		<!-- venobox js -->
		<script src="{{asset('front_assets/js/venobox.min.js')}}"></script>
        <!-- meanmenu js -->
        <script src="{{asset('front_assets/js/jquery.meanmenu.js')}}"></script>
		<!-- Form validator js -->
		<script src="{{asset('front_assets/js/form-validator.min.js')}}"></script>
		<!-- plugins js -->
		<script src="{{asset('front_assets/js/plugins.js')}}"></script>
		<!-- main js -->
		<script src="{{asset('front_assets/js/main.js')}}"></script>
	</body>
</html>