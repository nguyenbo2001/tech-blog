@section('title')
Liên Hệ -
@endsection

@extends('layouts.app')

@section('content')
<div class="page-title lb single-wrapper mt-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <h2><i class="fa fa-envelope-open-o bg-orange"></i> About us</h2>
      </div><!-- end col -->
      <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
        {{ Breadcrumbs::render('about') }}
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</div><!-- end page-title -->

<section class="section wb">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-wrapper">
          <div class="row">
            <div class="col-lg-5">
              <h4>Who we are</h4>
              <p>News Blog là blog cá nhân cho các tin tức mới nhất</p>
            </div>
            <div class="col-lg-7">
              <form onsubmit="event.preventDefault();" class="form-wrapper js-submit-contact-form" method="post">
                <div class="messages"></div>
                <input type="hidden" name="_action" value="{{ route('contact') }}">
                <input type="text" name="name" class="form-control" placeholder="Your name">
                <input type="text" name="email" class="form-control" placeholder="Email address">
                <input type="text" name="phone" class="form-control" placeholder="Phone">
                <input type="text" name="subject" class="form-control" placeholder="Subject">
                <textarea class="form-control" name="content" placeholder="Your message"></textarea>
                <button type="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
              </form>
            </div>
          </div>
        </div><!-- end page-wrapper -->
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</section>
@endsection
