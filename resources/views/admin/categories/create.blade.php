@extends('admin.layouts.app')

@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1 class="page-header">Thêm Loại Tin</h1>
        </div>
        <div class="col-7">
          @include('includes.error')

          @include('includes.message')

          <form action="{{ route('admin.categories.store') }}" method="post" class="form">
            @csrf()
            <div class="form-group">
              <label for="name">Tên Loại Tin</label>
              <input type="text" class="form-control" name="name" value="" id="name">
            </div>
            <div class="form-group">
              <label for="term_id">Thể Loại</label>
              <select name="term_id" id="term_id" class="custom-select">
                @foreach($terms as $term)
                  <option value="{{ $term->id }}">{{ $term->name }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
