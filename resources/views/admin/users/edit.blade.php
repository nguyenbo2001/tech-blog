@extends('admin.layouts.app')

@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1 class="page-header">Quản lý người dùng</h1>
        </div>
        <div class="col-7">
          @include('includes.error')

          @include('includes.message')

          <form action="{{ route('admin.users.update', $user) }}" method="post" class="form">
            @csrf()
            @method('PUT')
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
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-default">Quay Lại</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
