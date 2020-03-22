@extends('layouts.app')

@section('content')
<section class="section first-section mt-2">
	<div class="container-fluid">
		<div class="masonry-blog clearfix">
			@foreach( $featured_post as $post)
				@if ($loop->first)
					<div class="first-slot">
						<div class="masonry-box post-media">
							<img src="upload/posts/{{ $post->feature_image }}" alt="" class="img-fluid">
							<div class="shadoweffect">
								<div class="shadow-desc">
									<div class="blog-meta">
										<span class="bg-orange"><a href="{{ route('category', $post->category->slug ) }}" title="">{{ $post->category->name }}</a></span>
										<h4><a href="{{ route('post', $post->slug) }}" title="">{{ $post->title }}</a></h4>
										<small><a href="{{ route('post', $post->slug) }}" title="">{{ date('d-m-Y', strtotime($post->created_at))}}</a></small>
										<small><a href="{{ route('author', $post->user_id) }}" title="">by {{ $post->user->name }}</a></small>
									</div><!-- end meta -->
								</div><!-- end shadow-desc -->
							</div><!-- end shadow -->
						</div><!-- end post-media -->
					</div><!-- end first-side -->
				@endif

				@if ($loop->index == 1)
					<div class="second-slot">
						<div class="masonry-box post-media">
							<img src="upload/posts/{{ $post->feature_image }}" alt="" class="img-fluid">
							<div class="shadoweffect">
								<div class="shadow-desc">
									<div class="blog-meta">
										<span class="bg-orange"><a href="{{ route('category', $post->category->slug ) }}" title="">{{ $post->category->name }}</a></span>
										<h4><a href="{{ route('post', $post->slug) }}" title="">{{ $post->title }}</a></h4>
										<small><a href="{{ route('post', $post->slug) }}" title="">{{ date('d-m-Y', strtotime($post->created_at))}}</a></small>
										<small><a href="{{ route('author', $post->user_id) }}" title="">by {{ $post->user->name }}</a></small>
									</div><!-- end meta -->
								</div><!-- end shadow-desc -->
							</div><!-- end shadow -->
						</div><!-- end post-media -->
					</div><!-- end second-side -->
				@endif

				@if ($loop->last)
					<div class="last-slot">
						<div class="masonry-box post-media">
							<img src="upload/posts/{{ $post->feature_image }}" alt="" class="img-fluid">
							<div class="shadoweffect">
								<div class="shadow-desc">
									<div class="blog-meta">
										<span class="bg-orange"><a href="{{ route('category', $post->category->slug ) }}" title="">{{ $post->category->name }}</a></span>
										<h4><a href="{{ route('post', $post->slug) }}" title="">{{ $post->title }}</a></h4>
										<small><a href="{{ route('post', $post->slug) }}" title="">{{ date('d-m-Y', strtotime($post->created_at))}}</a></small>
										<small><a href="{{ route('author', $post->user_id) }}" title="">by {{ $post->user->name }}</a></small>
									</div><!-- end meta -->
								</div><!-- end shadow-desc -->
							</div><!-- end shadow -->
						</div><!-- end post-media -->
					</div><!-- end second-side -->
				@endif
			@endforeach
		</div><!-- end masonry -->
	</div>
</section>

<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
				<div class="page-wrapper">
					<div class="blog-top clearfix">
						<h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
					</div><!-- end blog-top -->

					<div class="blog-list clearfix">
						@foreach($new_post as $post)
							<div class="blog-box row">
								<div class="col-md-4">
									<div class="post-media">
										<a href="{{ route('post', $post->slug) }}" title="{{ $post->title }}">
											<img src="upload/posts/{{ $post->feature_image }}" alt="" class="img-fluid">
											<div class="hovereffect"></div>
										</a>
									</div><!-- end media -->
								</div><!-- end col -->

								<div class="blog-meta big-meta col-md-8">
									<h4><a href="{{ route('post', $post->slug) }}" title="">{{ $post->title }}</a></h4>
									<p>
										{!! $post->excerpt !!}
									</p>
									<small class="firstsmall"><a class="bg-orange" href="{{ route('category', $post->category->slug) }}" title="">{{ $post->category->name }}</a></small>
									<small><a href="{{ route('post', $post->slug) }}" title="">{{ date('d m, Y', strtotime($post->created_at))}}</a></small>
									<small><a href="{{ route('author', $post->user_id) }}" title="">by {{ $post->user->name }}</a></small>
									<small><a href="{{ route('post', $post->slug) }}" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
								</div><!-- end meta -->
							</div><!-- end blog-box -->

							@if (!$loop->last)
								<hr class="invis">
							@endif
						@endforeach
					</div><!-- end blog-list -->
				</div><!-- end page-wrapper -->

				<hr class="invis">

				<div class="row">
					<div class="col-md-12">
						{{ $new_post->links() }}
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end col -->

			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
				@include('includes.sidebar')
			</div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</section>

<div class="dmtop">Scroll to Top</div>
@endsection
