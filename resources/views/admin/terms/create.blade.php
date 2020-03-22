@extends('admin.layouts.app')

@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1 class="page-header">Thể Loại</h1>
        </div>
        <div class="col-7">
          @include('includes.error')

          @include('includes.message')

          <form action="{{ route('admin.terms.store') }}" method="post" class="form">
            @csrf()
            <div class="form-group">
              <label for="name">Tên Thể Loại</label>
              <input type="text" class="form-control" name="name" value="" id="name">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
