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

          <form action="{{ route('admin.posts.store') }}" method="post" class="form" enctype="multipart/form-data">
            @csrf()
            <div class="form-group">
              <label for="term_id">Thể Loại</label>
              <select name="term_id" id="term_id" class="select-custom form-control js-change-term">
                @foreach($terms as $term)
                  <option value="{{ $term->id }}"
                    {{ old('term_id') === $term->id ? 'selected' : '' }}
                  >
                    {{ $term->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="category_id">Loại Tin</label>
              <select name="category_id" id="category_id" class="select-custom form-control js-change-category">
                @foreach($categories as $category)
                  <option value="{{ $category->id }}"
                    {{ old('category_id') === $category->id ? 'selected' : '' }}
                  >
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="title">Tiêu đề</label>
              <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title">
            </div>
            <div class="form-group">
              <label for="excerpt">Tóm tắt</label>
              <textarea name="excerpt" id="excerpt" cols="30" rows="5" class="form-control ckeditor">
                {!! old('excerpt') !!}
              </textarea>
            </div>
            <div class="form-group">
              <label for="content">Nội dung</label>
              <textarea name="content" id="content" cols="30" rows="10" class="form-control ckeditor">
                {!! old('content') !!}
              </textarea>
            </div>
            <div class="form-group">
              <p><label>Thêm Hình Ảnh</label></p>
              <input type="file" class="form-control file-control" name="feature_image" value="{{ old('feature_image') }}">
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="1" name="top" id="top" {{ old('top') == '1' ? 'checked' : '' }}>
              <label class="form-check-label" for="top">
                Nổi bật
              </label>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
