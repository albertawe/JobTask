<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>JobTasker</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="/afterlogin/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/afterlogin/css/icomoon.css">
	<!-- Bootstrap  -->
	<!-- <link rel="stylesheet" href="/afterlogin/css/bootstrap.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="/afterlogin/css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="/afterlogin/fonts/flaticon/font/flaticon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/afterlogin/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/afterlogin/css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="/afterlogin/css/style.css">

	<!-- Modernizr JS -->
	<script src="/afterlogin/js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<h1 id="colorlib-logo"><a href="index.html">JobTasker</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>				
					<li class="@yield('colorlib_home')"><a href="/dashboard">Home</a></li>
					<li class="@yield('colorlib_posttask')"><a href="/posttask">Post Task</a></li>
					<li class="@yield('colorlib_browsetask')"><a href="/browsetask">Browse Task</a></li>
					<li class="@yield('colorlib_mytask')"><a href="/mytask">My Task</a></li>
					<li class="@yield('colorlib_offertask')"><a href="/postoffer">offer</a></li>
					<li class="@yield('colorlib_message')"><a href="/message">message</a></li>
					<li class="@yield('colorlib_helptask')"><a href="/email">help</a></li>
					<li ><a href="/logout">logout</a></li>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<ul>
					<li><a href="#"><i class="icon-facebook2"></i></a></li>
					<li><a href="#"><i class="icon-twitter2"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin2"></i></a></li>
				</ul>
			</div>

		</aside>
        <div id="colorlib-main">
        @yield('content')
        </div>
<!-- jQuery -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="/afterlogin/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/afterlogin/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/afterlogin/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/afterlogin/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="/afterlogin/js/jquery.flexslider-min.js"></script>
	<!-- Sticky Kit -->
	<script src="/afterlogin/js/sticky-kit.min.js"></script>
	<!-- Owl carousel -->
	<script src="/afterlogin/js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script src="/afterlogin/js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="/afterlogin/js/main.js"></script>
	@yield('javascript')
	</body>
</html>    