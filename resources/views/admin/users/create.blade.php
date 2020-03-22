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

          <form action="{{ route('admin.users.store') }}" method="post" class="form">
            @csrf()
            <div class="form-group">
              <label for="name">Tên người dùng</label>
              <input type="text" class="form-control" name="name" value="" id="name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="" id="email">
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu</label>
              <input type="password" class="form-control" name="password" value="" id="password">
            </div>
            <div class="form-group">
              <label for="password_again">Nhập lại mật khẩu</label>
              <input type="password" class="form-control" name="password_again" value="" id="password_again">
            </div>
            @if (auth()->user()->isAdmin())
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" name="role" id="role">
                <label class="form-check-label" for="role">
                  Admin
                </label>
              </div>
            @endif
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
