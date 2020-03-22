@section('title')
{{ $user->name }} -
@endsection

@extends('layouts.app')

@section('content')
<div class="page-title lb single-wrapper mt-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <h2><i class="fa fa-star bg-orange"></i> Author by: {{ $user->name }}</h2>
      </div><!-- end col -->
      <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
        {{ Breadcrumbs::render('author', $user ) }}
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</div><!-- end page-title -->

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
        <div class="page-wrapper">

          <div class="blog-list clearfix">
            @if(count($posts) > 0)
              @foreach($posts as $post)
                <div class="blog-box row">
                  <div class="col-md-4">
                    <div class="post-media">
                      <a href="{{ route('post', $post->slug) }}" title="">
                        <img src="upload/posts/{{ $post->feature_image }}" alt="" class="img-fluid">
                        <div class="hovereffect"></div>
                      </a>
                    </div><!-- end media -->
                  </div><!-- end col -->

                  <div class="blog-meta big-meta col-md-8">
                    <h4><a href="{{ route('post', $post->slug) }}" title="">{{ $post->title }}</a></h4>
                    <p>{!! $post->excerpt !!}</p>
                    <small class="firstsmall"><a class="bg-orange" href="{{ route('category', $post->category->slug) }}" title="">{{ $post->category->name }}</a></small>
                    <small><a href="{{ route('post', $post->slug) }}" title="">{{ date('d m,Y', strtotime($post->created_at)) }}</a></small>
                    <small><a href="{{ route('author', $post->user->id) }}" title="">by {{ $post->user->name }}</a></small>
                    <small><a href="{{ route('post', $post->slug) }}" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                  </div><!-- end meta -->
                </div><!-- end blog-box -->

                @if(!$loop->last)
                  <hr class="invis">
                @endif
              @endforeach
            @endif

          </div><!-- end blog-list -->
        </div><!-- end page-wrapper -->

        <hr class="invis">

        <div class="row">
          <div class="col-md-12">
            <nav aria-label="Page navigation">
              {{ $posts->links() }}
            </nav>
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end col -->

      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
        @include('includes.sidebar')
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</section>
@endsection
