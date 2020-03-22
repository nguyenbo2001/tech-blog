@extends('admin.layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h1 class="page-header">Quản lý Tin Tức</h1>
          </div>
          <div class="card-body">
            <table class="table table-striped tabler-bordered table-hover w-100 dataTables" id="dataTables" data-form="deleteForm">
              <thead>
                <tr align="center">
                  <th class="text-center">STT</th>
                  <th class="text-center">Tiêu Đề</th>
                  <th class="text-center">Tóm tắt</th>
                  <th class="text-center">Loại Tin</th>
                  <th class="text-center">Thể Loại</th>
                  <th class="text-center">Lượt xem</th>
                  <th class="text-center">Nổi bật</th>
                  <th class="text-center">Sửa</th>
                  <th class="text-center">Xóa</th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                  <tr class="odd" align="center">
                    <td>{{ $loop->index }}</td>
                    <td>
                      {{ $post->title }}
                      <div class="d-block">
                        <img width="100px" src="upload/posts/{{ $post->feature_image }}">
                      </div>
                    </td>
                    <td>{!! $post->excerpt !!}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->category->term->name }}</td>
                    <td>{{ $post->views }}</td>
                    <td>{{ $post->isTop() }}</td>
                    <td class="text-center"><i class="fa fa-pencil"></i><a class="btn btn-sm btn-primary" href="{{ route('admin.posts.edit', $post) }}">Sửa</a></td>
                    <td class="text-center">
                      <form action="{{ route('admin.posts.destroy', $post) }}" method="post" class="form-inline form-delete">
                        @csrf()
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <input type="submit" class="btn btn-sm btn-danger delete" name="delete_modal" value="Xóa">
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
