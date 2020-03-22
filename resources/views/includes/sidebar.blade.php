<div class="sidebar">
  <div class="widget">
    <h2 class="widget-title">Popular Posts</h2>
    <div class="blog-list-widget">
      <div class="list-group">
        @foreach($popular_post as $post)
          <a href="{{ route('post', $post->slug ) }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="w-100 justify-content-between">
              <img src="upload/posts/{{ $post->feature_image }}" alt="" class="img-fluid float-left">
              <h5 class="mb-1">{{ $post->title }}</h5>
              <small>{{ date('d m, Y', strtotime($post->date))}}</small>
            </div>
          </a>
        @endforeach
      </div>
    </div><!-- end blog-list -->
  </div><!-- end widget -->

  <div class="widget">
    <h2 class="widget-title">Recent Reviews</h2>
    <div class="blog-list-widget">
      <div class="list-group">
        @foreach($recent_comment as $comment)
          <a href="{{ route('post', $comment->post->slug ) }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="w-100 justify-content-between">
              <img src="upload/posts/{{ $comment->post->feature_image }}" alt="" class="img-fluid float-left">
              <h5 class="mb-1">{!! $comment->content !!}</h5>
              <span class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </span>
            </div>
          </a>
        @endforeach
      </div>
    </div><!-- end blog-list -->
  </div><!-- end widget -->
</div><!-- end sidebar -->
