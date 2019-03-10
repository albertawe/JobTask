<!DOCTYPE HTML>
<?php
use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();
?>
<html>
	<head>
	<?php echo $debugbarRenderer->renderHead() ?>
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
			<h1 id="colorlib-logo"><a href="/dashboard">JobTasker</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>				
					<li class="@yield('colorlib_home')"><a href="/dashboard">Profil</a></li>
					<li class="@yield('colorlib_posttask')"><a href="/posttask">Unggah Pekerjaan Baru(poster)</a></li>
					<li class="@yield('colorlib_browsetask')"><a href="/browsetask">Lowongan Tersedia (worker)</a></li>
					<li class="@yield('colorlib_mytask')"><a href="/mytask">Pekerjaan Saya</a></li>
					<!-- <li class="@yield('colorlib_offertask')"><a href="/postoffer">Tawaran yang dikirim (worker)</a></li> -->
					<li class="@yield('colorlib_message')"><a href="/message">Pesan</a></li>
					<li class="@yield('colorlib_helptask')"><a href="/email">Bantuan dan Pelaporan</a></li>
					@if(Auth::user()->user_type_id == 1)
					<li><a href="/admin/dashboard">admin page</a></li>
					@endif
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
	
	<script language="JavaScript" type="text/javascript" src="/afterlogin/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script language="JavaScript" type="text/javascript" src="/afterlogin/js/jquery.easing.1.3.js"></script>

	<!-- Waypoints -->
	<script language="JavaScript" type="text/javascript" src="/afterlogin/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script language="JavaScript" type="text/javascript" src="/afterlogin/js/jquery.flexslider-min.js"></script>
	<!-- Sticky Kit -->
	<script language="JavaScript" type="text/javascript" src="/afterlogin/js/sticky-kit.min.js"></script>
	<!-- Owl carousel -->
	<script language="JavaScript" type="text/javascript" src="/afterlogin/js/owl.carousel.min.js"></script>
	<!-- Counters -->
	<script language="JavaScript" type="text/javascript" src="/afterlogin/js/jquery.countTo.js"></script>
	<!-- Bootstrap -->
	<script src="/afterlogin/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	<!-- MAIN JS -->
	<script src="/afterlogin/js/main.js"></script>
	@yield('javascript')
	<?php echo $debugbarRenderer->render() ?>
	</body>
</html>    