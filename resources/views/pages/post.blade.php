@section('title')
 {{ $post->title }} -
@endsection

@extends('layouts.app')

@section('content')
<section class="section single-wrapper mt-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
				<div class="page-wrapper">
					<div class="blog-title-area text-center">
						{{ Breadcrumbs::render('post', $post) }}

						<span class="color-orange"><a href="{{ route('category', $post->category->slug ) }}" title="">{{ $post->category->name }}</a></span>

						<h3>{{ $post->title }}</h3>

						<div class="blog-meta big-meta">
							<small><a href="{{ route('post', $post->slug) }}" title="">{{ date('d m, Y', strtotime($post->created_at)) }}</a></small>
							<small><a href="{{ route('author', $post->user->id) }}" title="">by {{ $post->user->name }}</a></small>
							<small><a href="#" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
						</div><!-- end meta -->

					</div><!-- end title -->

					<div class="single-post-media">
						<img src="upload/posts/{{ $post->feature_image }}" alt="" class="img-fluid">
					</div><!-- end media -->

					<div class="blog-content">
						{!! $post->content !!}
					</div><!-- end content -->

					<hr class="invis1">

					<div class="custombox prevnextpost clearfix">
						<div class="row">
							<div class="col-lg-6">
								<div class="blog-list-widget">
									<div class="list-group">
										@isset($previous_post)
											<a href="{{ route('post', $previous_post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
												<div class="w-100 justify-content-between text-right">
													<img src="upload/posts/{{ $previous_post->feature_image }}" alt="" class="img-fluid float-right">
													<h5 class="mb-1">{{ $previous_post->title }}</h5>
													<small>Bài viết trước</small>
												</div>
											</a>
										@endisset
									</div>
								</div>
							</div><!-- end col -->

							<div class="col-lg-6">
								<div class="blog-list-widget">
									<div class="list-group">
										@isset($next_post)
											<a href="{{ route('post', $next_post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
												<div class="w-100 justify-content-between">
													<img src="upload/posts/{{ $next_post->feature_image }}" alt="" class="img-fluid float-left">
													<h5 class="mb-1">{{ $next_post->title }}</h5>
													<small>Bài tiếp theo</small>
												</div>
											</a>
										@endisset
									</div>
								</div>
							</div><!-- end col -->
						</div><!-- end row -->
					</div><!-- end author-box -->

					<hr class="invis1">

					<div class="custombox clearfix">
						<h4 class="small-title">Bạn cũng có thể thích</h4>
						<div class="row">
							@isset($recent_post)
								@foreach($recent_post as $recent_post_item)
									<div class="col-lg-6">
										<div class="blog-box">
											<div class="post-media">
												<a href="{{ route('post', $recent_post_item->slug) }}" title="">
													<img src="upload/posts/{{ $recent_post_item->feature_image }}" alt="" class="img-fluid">
													<div class="hovereffect">
														<span class=""></span>
													</div><!-- end hover -->
												</a>
											</div><!-- end media -->
											<div class="blog-meta">
												<h4><a href="{{ route('post', $recent_post_item->slug) }}" title="">{{ $recent_post_item->title }}</a></h4>
												<small><a href="{{ route('category', $recent_post_item->category->slug ) }}" title="">{{ $recent_post_item->category->name }}</a></small>
												<small><a href="{{ route('category', $recent_post_item->category->slug ) }}" title="">{{ date('d m, Y', strtotime($recent_post_item->created_at)) }}</a></small>
											</div><!-- end meta -->
										</div><!-- end blog-box -->
									</div><!-- end col -->
								@endforeach
							@endisset
						</div><!-- end row -->
					</div><!-- end custom-box -->

					<hr class="invis1">

					@if (count($post->comment))
						<div class="custombox clearfix">
							<h4 class="small-title">{{ count($post->comment) }} Comments</h4>
							<div class="row">
								<div class="col-lg-12">
									<div class="comments-list">
										@foreach($post->comment as $comment)
											<div class="media @if ($loop->last) last-child @endif">
												<a class="media-left" href="#">
													<img src="upload/users/{{ $comment->user->avatar }}" alt="" class="rounded-circle">
												</a>
												<div class="media-body">
													<h4 class="media-heading user_name">{{ $comment->user->name }} <small>{{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->diffInDays($comment->created_at) }} days ago</small></h4>
													<p>{!! $comment->content !!}</p>
												</div>
											</div>
										@endforeach
									</div>
								</div><!-- end col -->
							</div><!-- end row -->
						</div><!-- end custom-box -->

						<hr class="invis1">
					@endif

					@auth
						<div class="custombox clearfix">
							<h4 class="small-title">Leave a Reply</h4>
							<div class="row">
								<div class="col-lg-12">
									<form class="form-wrapper" method="post" action="{{ route('comment', $post) }}">
										@csrf
										<input type="hidden" name="post_id" value="{{$post->id}}">
										<textarea name="content" class="form-control" placeholder="Your comment"></textarea>
										<button type="submit" class="btn btn-primary">Submit Comment</button>
									</form>
								</div>
							</div>
						</div>
					@endauth
				</div><!-- end page-wrapper -->
			</div><!-- end col -->

			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
				@include('includes.sidebar')
			</div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</section>

@endsection
