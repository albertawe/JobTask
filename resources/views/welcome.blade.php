<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jobtasker</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="/css/nologin/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="/css/nologin/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="/css/nologin/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="/css/nologin/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<!-- <link rel="stylesheet" href="/css/nologin/font-awesome.min.css"> -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="/css/nologin/style.css" />
	<!-- bootstrap -->
	</head>

<body>
	<header id="home">
		<div class="bg-img" style="background-image: url('./img/background4.jpg');">
			<div class="overlay"></div>
		</div>
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<div class="navbar-brand">
						<a href="index.html">
							<img class="logo" src="img/logo.png" alt="logo">
							<img class="logo-alt" src="img/logo-alt.png" alt="logo">
						</a>
					</div>
					<div class="nav-collapse">
						<span></span>
					</div>
				</div>
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="#home">Home</a></li>
					<li><a href="#portfolio">Category</a></li>
					<li><a href="#service">Completed</a></li>
					<li><a href="#pricing">How to</a></li>
					<li><a href="#team">Team</a></li>
					<li><a href="#contact">Contact</a></li>
					@if (!\Auth::user())
					<li><a href="/login">Login</a></li>
					<li><a href="/register">Register</a></li>
					@else
					<li><a href="/dashboard">Dashboard</a></li>
					<li><a href="/logout">Logout</a></li>
					@endif

				</ul>
			</div>
		</nav>
		<div class="home-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text">Membantu anda dalam menyelesaikan pekerjaan harian anda</h1>
							<p class="white-text">Menyediakan platform outsourcing atas pekerjaan harian</p>
							<button class="white-btn"><a href="/browsetask">ayo mulai!</a></button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</header>
	<div id="portfolio" class="section md-padding bg-grey">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">Kategori</h2>
				</div>
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work1.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Business & Admin</h3>
						<div class="work-link">
							<a href="/browsetask"><i class="fa fa-external-link"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work2.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Cleaning</h3>
						<div class="work-link">
							<a href="/browsetask"><i class="fa fa-external-link"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work3.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Delivery & removals</h3>
						<div class="work-link">
							<a href="/browsetask"><i class="fa fa-external-link"></i></a>
					</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work4.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Furniture assembly</h3>
						<div class="work-link">
							<a href="/browsetask"><i class="fa fa-external-link"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work5.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Handyman</h3>
						<div class="work-link">
							<a href="/browsetask"><i class="fa fa-external-link"></i></a>
					</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="./img/work6.jpg" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span>Category</span>
						<h3>Anything</h3>
						<div class="work-link">
							<a href="/browsetask"><i class="fa fa-external-link"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="service" class="section md-padding ">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">Beberapa task terbaru</h2>	
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="testimonial"><div class="testimonial-meta">
						<img src="./img/perso1.jpg" alt="">
						</div></div>
						<h3>Cleaning</h3>
						<p>membantu dalam membersihkan kamar 5x5 meter dengan berbagai perabot	</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="testimonial"><div class="testimonial-meta">
						<img src="./img/perso2.jpg" alt="">
						</div></div>
						<h3>Moving</h3>
						<p>Memerlukan tenaga tembahan untuk memindahkan tempat tidur queen size dari lantai 1 ke lantai 2</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="testimonial"><div class="testimonial-meta">
						<img src="./img/perso1.jpg" alt="">
						</div></div>
						<h3>Packaging</h3>
						<p>Memerlukan worker untuk membantu proses packaging sebuah toko baju online</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="testimonial"><div class="testimonial-meta">
						<img src="./img/perso2.jpg" alt="">
						</div></div>
						<h3>Assembling</h3>
						<p>Help assemble new bought chair.</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="testimonial"><div class="testimonial-meta">
						<img src="./img/perso1.jpg" alt="">
						</div></div>
						<h3>Removal</h3>
						<p>Remove unused cardboard boxes in garage.</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="testimonial"><div class="testimonial-meta">
						<img src="./img/perso2.jpg" alt="">
						</div></div>
						<h3>Design</h3>
						<p>Help design logo for italian restaurant.</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
						<p class="material-icons" style="font-size:24px">star</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
<div id="pricing" class="section md-padding bg-grey">
<div class="container">
	<div class="row">
		<div class="section-header text-center">
			<h2 class="title">Bagaimana menggunakan Jobtasker?</h2>
		</div>
		<div class="col-sm-4">
			<div class="pricing">
				<div class="price-head">
					<span class="price-title">Post task anda</span>
					<i class="material-icons" style="font-size:72px">note_add</i>
				</div>
				<ul class="price-content">
					<li>
						<p>Beritahu kami apa yang anda ingin selesaikan.</p>
					</li>
					<li>
						<p>Gratis kok tanpa syarat ketentuan</p>
					</li><br><br>
				</ul>
				
			</div>
		</div>
		<div class="col-sm-4">
			<div class="pricing">
				<div class="price-head">
					<span class="price-title">Lihat review para worker</span>
					<i class="material-icons" style="font-size:66px">star</i>
					<i class="material-icons" style="font-size:66px">star</i>
					<i class="material-icons" style="font-size:66px">star_half</i>
				</div>
				<ul class="price-content">
					<li>
						<p>Dapatkan tawaran dari worker terpercaya </p>
					</li>
					<li>
						
					</li><br><br>
				</ul>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="pricing">
				<div class="price-head">
					<span class="price-title">Get it done</span>
					<i class="material-icons" style="font-size:72px">check</i>
				</div>
				<ul class="price-content">
					<li>
						<p>Pilih worker yang paling baik bagi</p>
					</li>
					<li>
						<p>pekerjaan anda dan biarkan worker selesaikan semuanya!.</p>
					</li><br><br>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
<div id="team" class="section md-padding">
<div class="container">
	<div class="row">
		<div class="section-header text-center">
			<h2 class="title">worker yang siap melayani anda</h2>
		</div>
		<p>Beberapa worker yang siap melayani anda</p>
		<div class="col-sm-4">
			<div class="team">
				<div class="team-img">
					<img class="img-responsive" src="./img/team1.jpg" alt="">
					<div class="overlay">
						<div class="team-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
						</div>
					</div>
				</div>
				<div class="team-content">
					<h3>John Doe</h3>
					<span>speciality: delivery, cleaning</span><br>
					<!-- <p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p> -->
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="team">
				<div class="team-img">
					<img class="img-responsive" src="./img/team2.jpg" alt="">
					<div class="overlay">
						<div class="team-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
						</div>
					</div>
				</div>
				<div class="team-content">
					<h3>James Roe</h3>
					<span>speciality: assembly, handyman</span><br>
					<!-- <p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p> -->
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="team">
				<div class="team-img">
					<img class="img-responsive" src="./img/team3.jpg" alt="">
					<div class="overlay">
						<div class="team-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
						</div>
					</div>
				</div>
				<div class="team-content">
					<h3>Joe Poe</h3>
					<span>speciality: design, marketing</span><br>
					<!-- <p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p>
					<p class="material-icons" style="font-size:24px">star</p> -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	<div id="about" class="section md-padding bg-grey">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">More about Jobtasker</h2>
				</div>
				<div class="col-md-4">
					<div class="about">
						<i class="fa fa-credit-card"></i>
						<h4>Pembayaran Terpercaya</h4>
						<p>Menggunakan Bank Terpercaya dalam melakukan setiap transaksi dengan aman dan cepat. sehingga task anda dapat langsung dilakukan setelah pembayaran
						dan pastinya selalu dapat direfund.</p>
					
					</div>
				</div>
				<div class="col-md-4">
					<div class="about">
						<i class="fa fa-clock-o"></i>
						<h4>Proses Cepat</h4>
						<p>Memastikan semua proses dalam sistem berjalan cepat dan mudah.</p>
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="about">
						<i class="fa fa-balance-scale"></i>
						<h4>Everything is handled</h4>
						<p>Mulai dari tahap Posting hingga Selesainya task anda, tersedia admin untuk melayani 24 jam.</p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<Br>
	<section id="about" class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="info-header mb-5">
            <h1 class="text-primary pb-3">
              Pertanyaan yang sering ditanyakan
            </h1>
          </div>

          <!-- ACCORDION -->
          <div id="accordion">
            <div class="card">
              <div class="card-header">
                <h5 class="mb-0">
                  <div href="#collapse1" data-toggle="collapse" data-parent="#accordion">
                    <i class="fas fa-arrow-circle-down"></i> Bagaimana merekrut worker?
                  </div>
                </h5>
              </div>

              <div id="collapse1" class="collapse">
                <div class="card-body">
                  1. melakukan login <br>
				  2. Pilih menu "Posting Pekerjaan" dan isi form yang berisi informasi lowongan pekerjaan anda<br>
				  3. Monitor Task anda melalui menu "Pekerjaan Saya" <br>
				  4. Dalam beberapa saat anda akan mendapatkan tawaran dari para worker yang dapat dilihat pada halaman task anda <br>
				  5. Anda dapat melihat profil dan menukar pesan dengan para worker yang memberi tawaran <br>
				  6. Lakukan pembayaran dengan melakukan transfer ke rekening xxx sesuai nominal yang dijanjikan untuk menerima salah satu tawaran <br>
				  7. Setelah anda melakukan pembayaran, worker akan segera memproses Task anda <br>
                </div>
              </div>
            </div>
			<Br>
            <div class="card">
              <div class="card-header">
                <h5 class="mb-0">
                  <div href="#collapse2" data-toggle="collapse" data-parent="#accordion">
                    <i class="fas fa-arrow-circle-down"></i> Gain The Knowledge
                  </div>
                </h5>
              </div>

              <div id="collapse2" class="collapse">
                <div class="card-body">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit odit laborum qui, debitis, sequi dolores nobis mollitia
                  labore quasi earum laboriosam nihil cupiditate magnam iusto nostrum doloremque accusantium repudiandae
                  expedita autem et, repellendus suscipit consequatur! Alias, maiores amet sunt ab inventore illo, deleniti
                  facilis consequatur tenetur nam pariatur fuga nisi!
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h5 class="mb-0">
                  <div href="#collapse3" data-toggle="collapse" data-parent="#accordion">
                    <i class="fas fa-arrow-circle-down"></i> Open Your Mind
                  </div>
                </h5>
              </div>

              <div id="collapse3" class="collapse">
                <div class="card-body">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit odit laborum qui, debitis, sequi dolores nobis mollitia
                  labore quasi earum laboriosam nihil cupiditate magnam iusto nostrum doloremque accusantium repudiandae
                  expedita autem et, repellendus suscipit consequatur! Alias, maiores amet sunt ab inventore illo, deleniti
                  facilis consequatur tenetur nam pariatur fuga nisi!
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
	<div id="contact" class="section md-padding">
		<div class="container">
			<div class="row">
				<div class="section-header text-center">
					<h2 class="title">Get in touch</h2>
				</div>
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-phone"></i>
						<h3>Phone</h3>
						<p>123-123-123</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-envelope"></i>
						<h3>Email</h3>
						<p>email@support.com</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-map-marker"></i>
						<h3>Address</h3>
						<p>1739 Bubby Drive</p>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-2">
					<form class="contact-form">
						<input type="text" class="input" placeholder="Name">
						<input type="email" class="input" placeholder="Email">
						<input type="text" class="input" placeholder="Subject">
						<textarea class="input" placeholder="Message"></textarea>
						<button class="main-btn">Send message</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<footer id="footer" class="sm-padding bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-logo">
						<a href="#"><img src="/img/logo-alt.png" alt="logo"></a>
					</div>
					<ul class="footer-follow">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<div class="footer-copyright">
						<p>Copyright © 2018. All Rights Reserved.
					</div>
				</div>

			</div>
		</div>
	</footer>
	<div id="back-to-top"></div>
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<script type="text/javascript" src="/js/nologin/jquery.min.js"></script>
	<script type="text/javascript" src="/js/nologin/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/nologin/owl.carousel.min.js"></script>
	<script type="text/javascript" src="/js/nologin/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="/js/nologin/main.js"></script>

</body>

</html>
