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

          <form action="{{ route('admin.terms.update', $term) }}" method="post" class="form">
            @csrf()
            @method('PUT')
            <div class="form-group">
              <label for="name">Tên Thể Loại</label>
              <input type="text" class="form-control" name="name" value="{{ $term->name }}" id="name">
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('admin.terms.index') }}" class="btn btn-default">Quay Lại</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
