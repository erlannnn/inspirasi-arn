<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta
			name="description"
			content=""
		/>
		{{-- <meta name="referrer" content="origin"> --}}

		<!-- title -->
		<title>Forum Inspirasi ARN | {{ $title }}</title>

		<!-- favicon -->
		<link
			rel="shortcut icon"
			type="image/png"
			href="/assets_frontend/img/logo-arn.png"
		/>
		<!-- google font -->
		<link
			href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700"
			rel="stylesheet"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap"
			rel="stylesheet"
		/>
		<!-- fontawesome -->
		<link rel="stylesheet" href="/assets_frontend/css/all.min.css" />
		<!-- bootstrap -->
		<link rel="stylesheet" href="/assets_frontend/bootstrap/css/bootstrap.min.css" />
		<!-- owl carousel -->
		<link rel="stylesheet" href="/assets_frontend/css/owl.carousel.css" />
		<!-- magnific popup -->
		<link rel="stylesheet" href="/assets_frontend/css/magnific-popup.css" />
		<!-- animate css -->
		<link rel="stylesheet" href="/assets_frontend/css/animate.css" />
		<!-- mean menu css -->
		<link rel="stylesheet" href="/assets_frontend/css/meanmenu.min.css" />
		<!-- main style -->
		<link rel="stylesheet" href="/assets_frontend/css/main.css" />
		<!-- responsive -->
		<link rel="stylesheet" href="/assets_frontend/css/responsive.css" />
	</head>
	<body>
		<!--PreLoader-->
		<div class="loader">
			<div class="loader-inner">
				<div class="circle"></div>
			</div>
		</div>
		<!--PreLoader Ends-->

		<!-- header -->
		<div class="top-header-area" id="sticker">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 text-center">
						<div class="main-menu-wrap">
							<!-- logo -->
							<div class="site-logo">
								<a href="/">
									<img
										src="/assets_frontend/img/logo-arn.png"
										alt=""
										width="50%"
									/>
								</a>
							</div>
							<!-- logo -->

							<!-- menu start -->
							<nav class="main-menu">
								<ul>
									<li class="{{ ($title === "Home" ? 'current-list-item' : '') }}">
										<a href="/">Home</a>
									</li>
									<li class="{{ ($title === "About" ? 'current-list-item' : '') }}">
										<a href="/about">About</a>
									</li>
									<li class="{{ ($title === "News" ? 'current-list-item' : '') }}">
										<a href="/news">News</a>
									</li>
									<li class="{{ ($title === "Contact" ? 'current-list-item' : '') }}">
										<a href="/contact">Contact</a>
									</li>
									@if (auth()->user())	
									<li>
										<a href="/logout">Logout</a>
									</li>
									@else
										<li>
											<a href="/login">Login</a>
										</li>
									@endif
								</ul>
							</nav>
							<a class="mobile-show search-bar-icon" href="#"
								><i class="fas fa-search"></i
							></a>
							<div class="mobile-menu"></div>
							<!-- menu end -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end header -->

		<!-- search area -->
		<div class="search-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<span class="close-btn"
							><i class="fas fa-window-close"></i
						></span>
						<div class="search-bar">
							<div class="search-bar-tablecell">
								<h3>Search For:</h3>
								<input type="text" placeholder="Keywords" />
								<button type="submit">
									Search <i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end search area -->


		@yield('content')


		<!-- footer -->
		<div class="footer-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="footer-box about-widget">
							<h2 class="widget-title">About us</h2>
							<p>
								Ut enim ad minim veniam perspiciatis unde omnis
								iste natus error sit voluptatem accusantium
								doloremque laudantium, totam rem aperiam, eaque
								ipsa quae.
							</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-box get-in-touch">
							<h2 class="widget-title">Get in Touch</h2>
							<ul>
								<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
								<li>support@fruitkha.com</li>
								<li>+00 111 222 3333</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-box pages">
							<h2 class="widget-title">Pages</h2>
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="services.html">Shop</a></li>
								<li><a href="news.html">News</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-box subscribe">
							<h2 class="widget-title">Subscribe</h2>
							<p>
								Subscribe to our mailing list to get the latest
								updates.
							</p>
							<form action="index.html">
								<input type="email" placeholder="Email" />
								<button type="submit">
									<i class="fas fa-paper-plane"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end footer -->

		<!-- copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<p>
							Copyrights &copy; 2019 -
							<a href="https://imransdesign.com/">Imran Hossain</a
							>, All Rights Reserved.
						</p>
					</div>
					<div class="col-lg-6 text-right col-md-12">
						<div class="social-icons">
							<ul>
								<li>
									<a href="#" target="_blank"
										><i class="fab fa-facebook-f"></i
									></a>
								</li>
								<li>
									<a href="#" target="_blank"
										><i class="fab fa-twitter"></i
									></a>
								</li>
								<li>
									<a href="#" target="_blank"
										><i class="fab fa-instagram"></i
									></a>
								</li>
								<li>
									<a href="#" target="_blank"
										><i class="fab fa-linkedin"></i
									></a>
								</li>
								<li>
									<a href="#" target="_blank"
										><i class="fab fa-dribbble"></i
									></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end copyright -->

		<!-- jquery -->
		<script src="/assets_frontend/js/jquery-1.11.3.min.js"></script>
		<!-- bootstrap -->
		<script src="/assets_frontend/bootstrap/js/bootstrap.min.js"></script>
		<!-- count down -->
		<script src="/assets_frontend/js/jquery.countdown.js"></script>
		<!-- isotope -->
		<script src="/assets_frontend/js/jquery.isotope-3.0.6.min.js"></script>
		<!-- waypoints -->
		<script src="/assets_frontend/js/waypoints.js"></script>
		<!-- owl carousel -->
		<script src="/assets_frontend/js/owl.carousel.min.js"></script>
		<!-- magnific popup -->
		<script src="/assets_frontend/js/jquery.magnific-popup.min.js"></script>
		<!-- mean menu -->
		<script src="/assets_frontend/js/jquery.meanmenu.min.js"></script>
		<!-- sticker js -->
		<script src="/assets_frontend/js/sticker.js"></script>
		<!-- main js -->
		<script src="/assets_frontend/js/main.js"></script>
	</body>
</html>
