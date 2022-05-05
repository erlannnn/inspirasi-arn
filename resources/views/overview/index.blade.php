@extends('overview.main')
@section('content')
	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<h1>Forum Inspirasi</h1>
							<p class="subtitle">Pojok ARN</p>
							<div class="hero-btns">
								<a
									href="https://www.youtube.com/c/ForumInspirasiARN"
									class="boxed-btn"
									>Youtube Channel</a
								>
								<a href="/contact" class="bordered-btn"
									>Contact Us</a
								>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Penuh Inspirasi</h3>
							<p>Obrolan penuh inspirasi</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>Berita Terkini</h3>
							<p>Menyajikan berita terkini</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div
						class="
							list-box
							d-flex
							justify-content-start
							align-items-center
						"
					>
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Akurat dan Lengkap</h3>
							<p>Mwnyajikan berita akurat dan lengkap</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">About</span> Us</h3>
						<p>
							“Forum Inspirasi Pojok ARN” ini digagas oleh Arief Rahmat Nugraha atau disingkat
							dengan nama ARN hadir di tengah-tengah masyarakat Ketika masyarakat
							membutuhkan sosok inspiratif yang bisa ditiru sebagai teladan maka Forum ini hadir
							sebagai penyambung Lidah dari Narasumber kepada Masyarakat Luas. Para
							Narasumber yang diulas merupakan para Inspirator yang sudah melakukan hal-hal
							positif yang kemungkinan besar bisa mengubah cara seseorang dalam memandang
							kemampuan diri sendiri.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- testimonail-section -->
	<div class="testimonail-section cart-banner mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img
									src="/assets_frontend/img/avaters/avatar1.png"
									alt=""
								/>
							</div>
							<div class="client-meta">
								<h3>
									Saira Hakim
									<span>Local shop owner</span>
								</h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste
									natus error veritatis et quasi
									architecto beatae vitae dict eaque ipsa
									quae ab illo inventore Sed ut
									perspiciatis unde omnis iste natus error
									sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img
									src="/assets_frontend/img/avaters/avatar2.png"
									alt=""
								/>
							</div>
							<div class="client-meta">
								<h3>
									David Niph <span>Local shop owner</span>
								</h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste
									natus error veritatis et quasi
									architecto beatae vitae dict eaque ipsa
									quae ab illo inventore Sed ut
									perspiciatis unde omnis iste natus error
									sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img
									src="/assets_frontend/img/avaters/avatar3.png"
									alt=""
								/>
							</div>
							<div class="client-meta">
								<h3>
									Jacob Sikim
									<span>Local shop owner</span>
								</h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste
									natus error veritatis et quasi
									architecto beatae vitae dict eaque ipsa
									quae ab illo inventore Sed ut
									perspiciatis unde omnis iste natus error
									sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Our</span> News</h3>
						<p>
							Lorem ipsum dolor sit amet, consectetur
							adipisicing elit. Aliquid, fuga quas itaque
							eveniet beatae optio.
						</p>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach ($news as $new)
					<div class="col-lg-4 col-md-6">
						<div class="single-latest-news">
							<a href="{{ 'news/'.$new->slug }}"
								><div class="latest-news-bg news-bg-1">
									<img src="{{ asset('storage/'. $new->sampul) }}" alt="">
									</div
							></a>
							<div class="news-text-box">
								<h3>
									<a href="{{ 'news/'.$new->slug }}">
										<?php if (strlen($new->title) <= 45 ){echo $new->title;} else{ echo substr($new->title,0,45).'...'; } ?>
									</a>
								</h3>
								<p class="blog-meta">
									<span class="author"
										><i class="fas fa-user"></i> {{ $new->author->name }}</span
									>
									<span class="date"
										><i class="fas fa-calendar"></i>{{ $new->upload_at }}</span
									>
								</p>
								<p class="excerpt">
									{{ $new->excerpt }}
								</p>
								<a href="{{ 'news/'.$new->slug }}" class="read-more-btn"
									>read more <i class="fas fa-angle-right"></i
								></a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="/news" class="boxed-btn">More News</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->
@endsection