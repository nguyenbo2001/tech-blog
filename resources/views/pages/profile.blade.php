@section('title')
User Setting -
@endsection

@extends('layouts.app')

@section('content')
<div class="page-title lb single-wrapper mt-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <h2><i class="fa fa-envelope-open-o bg-orange"></i> User Setting</h2>
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
            <div class="col-lg-7 mx-auto">
              <form onsubmit="event.preventDefault();" class="form-wrapper js-submit-profile-form" method="post">
                <div class="messages"></div>
                <input type="hidden" name="_action" value="{{ route('update-profile') }}">
                <div class="form-group">
                  <label for="name">Tên người dùng</label>
                  <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" value="{{ $user->email }}" id="email" readonly="">
                </div>
                <div class="form-group">
                <label for="change_password">Đổi mật khẩu</label>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="change_password" id="change_password1" value="1">
                    <label class="form-check-label" for="change_password1">
                      Có
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="change_password" id="change_password2" value="0" checked>
                    <label class="form-check-label" for="change_password2">
                      Không
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Mật khẩu</label>
                  <input type="password" class="form-control disabled-field" name="password" value="" id="password" disabled="">
                </div>
                <div class="form-group">
                  <label for="password_again">Nhập lại mật khẩu</label>
                  <input type="password" class="form-control disabled-field" name="password_again" value="" id="password_again" disabled="">
                </div>
                @if (auth()->user()->isAdmin())
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="1" name="role" id="role" @if($user->isAdmin()) checked="checked" @endif>
                    <label class="form-check-label" for="role">
                      Admin
                    </label>
                  </div>
                @endif
                <button type="submit" class="btn btn-primary">Cập nhật</button>
              </form>
            </div>
          </div>
        </div><!-- end page-wrapper -->
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</section>
@endsection
