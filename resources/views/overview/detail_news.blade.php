@extends('overview.main')
@section('content')
    	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Read the Details</p>
						<h1>Single Article</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	
	<!-- single article section -->
	<div class="mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="single-article-section">
						<div class="single-article-text">
							<div class="single-artcile-bg"><img src="{{ asset('storage/'. $article->sampul) }}" alt=""></div>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i>{{ $article->author->name }}</span>
								<span class="date"><i class="fas fa-calendar"></i>{{ $article->upload_at }}</span>
							</p>
							<h2>{{ $article->title }}</h2>
							{!! $article->description !!}
						</div>

						<div class="comments-list-wrap">
							<h3 class="comment-count-title">{{ $count_comments }} Comments</h3>
							<div class="comment-list">
								@foreach ($comments as $comment)
									<div class="single-comment-body">
										<div class="comment-user-avater">
											<img src="/assets_frontend/img/avaters/avatar2.png" alt="">
										</div>
										<div class="comment-text-body">
											<h4>{{ $comment->user->name }} <span class="comment-date">{{ $comment->created_at }}</span> 	</h4>
											<p>{{ $comment->comment }}</p>
										</div>
									</div>
								@endforeach
							</div>
						</div>

						<div class="comment-template">
							<h4>Leave a comment</h4>
							<p>If you have a comment dont feel hesitate to send us your opinion.</p>
							@if (auth()->user())
								<form action="/comment/{{ $article->slug }}" method="post">
									@csrf
									<p>
										<input type="text" placeholder="Your Name" name="name" value="{{ auth()->user()->name }}" readonly="1">
										<input type="email" placeholder="Your Email" name="email" value="{{ auth()->user()->email }}" readonly="1">
									</p>
									<p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Message" name="comment"></textarea></p>
									<p><button type="submit" class="btn	btn-warning">Submit</button></p>
								</form>
							@else
								
							<p>Login terlebih dahulu untuk memberikan komen</p>
								<form action="/comment/{{ $article->slug }}" method="post">
									<p><a href="/login" class="btn btn-warning">Login</a></p>
								</form>
							@endif
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar-section">
						<div class="recent-posts">
							<h4>Recent Posts</h4>
							<ul>
								@foreach ($news as $new)
									<li><a href="{{ '/news/'.$new->slug }}">{{ $new->title }}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="tag-section">
							<h4>Categories</h4>
							<ul>
								@foreach ($article->categories as $category)
									<li><a href="category/{{ $category->slug }}">{{ $category->name }}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="tag-section">
							<h4>Tags</h4>
							<ul>
								@foreach ($article->genres as $genre)
									<li><a href="tag/{{ $genre->slug }}">{{ $genre->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single article section -->
@endsection