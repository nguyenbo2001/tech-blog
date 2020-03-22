@extends('admin.layouts.app')

@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1 class="page-header">Loại Tin</h1>
        </div>
        <div class="col-7">
          @include('includes.error')

          @include('includes.message')

          <form action="{{ route('admin.categories.update', $category) }}" method="post" class="form">
            @csrf()
            @method('PUT')
            <div class="form-group">
              <label for="name">Tên Loại Tin</label>
              <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="name">
            </div>
            <div class="form-group">
              <label for="term_id">Thể Loại</label>
              <select name="term_id" id="term_id" class="custom-select">
                @foreach($terms as $term)
                  <option value="{{ $term->id }}" {{ $term->id == $category->term_id ? 'selected' : ''}}>{{ $term->name }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Quay Lại</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
