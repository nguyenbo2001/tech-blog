@extends('admin.layouts.app')

@section('content')
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1 class="page-header">Tin Tức</h1>
        </div>
        <div class="col-7">
          @include('includes.error')

          @include('includes.message')

          <form action="{{ route('admin.posts.update', $post) }}" method="post" class="form" enctype="multipart/form-data">
            @csrf()
            @method('PUT')
            <div class="form-group">
              <label for="term_id">Thể Loại</label>
              <select name="term_id" id="term_id" class="select-custom form-control js-change-term">
                @foreach($terms as $term)
                  <option value="{{ $term->id }}"
                    {{ $post->category->term_id === $term->id ? 'selected' : '' }}
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
                    {{ $post->category_id === $category->id ? 'selected' : '' }}
                  >
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="title">Tiêu đề</label>
              <input type="text" class="form-control" name="title" value="{{ $post->title }}" id="title">
            </div>
            <div class="form-group">
              <label for="excerpt">Tóm tắt</label>
              <textarea name="excerpt" id="excerpt" cols="30" rows="5" class="form-control ckeditor">
                {!! $post->excerpt !!}
              </textarea>
            </div>
            <div class="form-group">
              <label for="content">Nội dung</label>
              <textarea name="content" id="content" cols="30" rows="10" class="form-control ckeditor">
                {!! $post->content !!}
              </textarea>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="1" name="top" id="top" {{ $post->top == '1' ? 'checked' : '' }}>
              <label class="form-check-label" for="top">
                Nổi bật
              </label>
            </div>
            <div class="form-group">
              <label>Thêm Hình Ảnh</label></p>
              <p>
                  <img width="400px" src="upload/posts/{{ $post->feature_image }}">
              </p>
              <input type="file" class="form-control" name="feature_image">
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-default">Quay Lại</a>
          </form>
        </div>
      </div>
      @if( count($post->comment) )
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-striped table-bordered table-hover mt-5" id="dataTables">
            <thead>
              <tr align="center">
                <th class="text-center">STT</th>
                <th class="text-center">Người bình luận</th>
                <th class="text-center">Nội dung</th>
                <th class="text-center">Ngày đăng</th>
                <th class="text-center">Xóa</th>
              </tr>
            </thead>
            <tbody>
              @foreach($post->comment as $comment)
                <tr class="odd gradeX" align="center">
                  <td>{{ $loop->index }}</td>
                  <td>{{ $comment->user->name }}</td>
                  <td>{{ $comment->content }}</td>
                  <td>{{ date('d/m/Y', strtotime($comment->created_at)) }}</td>
                  <td class="text-center">
                    <form action="{{ route('admin.comments.destroy', $comment) }}" method="post" class="form-inline form-delete">
                      @csrf()
                      @method('DELETE')
                      <input type="hidden" name="id" value="{{ $comment->id }}">
                      <input type="submit" class="btn btn-sm btn-danger delete" name="delete_modal" value="Xóa">
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif
    </div>
  </div>
@endsection
