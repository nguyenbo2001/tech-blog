@extends('admin.layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1>Welcome {{ Auth::user()->name }}</h1>
      </div>
      <div class="col-md-6">
        <div class="card mt-4">
          <div class="card-header">
            <strong>Lịch</strong>
          </div>
          <div class="card-body">
            <p>Hôm nay là: {{ date('l') }}, Ngày {{ date('d/m/Y') }}.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 clearfix">
        <div class="card mt-4">
          <div class="card-header">
            <strong>Danh sách các bình luận mới</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered table-hover dataTables" id="dataTables" style="width: 100%">
              <thead>
                <tr>
                  <th class="text-center">Id</th>
                  <th class="text-center">Nội dung</th>
                  <th class="text-center">Tên người dùng</th>
                  <th class="text-center">Tiêu đề bài viết</th>
                  <th class="text-center">Thời gian đăng bài</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($comments as $comment)
                  <tr class="odd">
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{ $comment->post->title }}</td>
                    <td>{{ date('d/m/Y', strtotime($comment->created_at)) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="card mt-4">
          <div class="card-header">
            <strong>Danh sách các bài viết mới</strong>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered table-hover" id="dataTables">
              <thead>
                <tr>
                  <th class="text-center">Id</th>
                  <th class="text-center">Tiêu đề</th>
                  <th class="text-center">Tóm tắt</th>
                  <th class="text-center">Loại tin</th>
                  <th class="text-center">Thể loại</th>
                  <th class="text-center">Ngày đăng</th>
                  <th class="text-center">Số lượt xem</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                  <tr class="odd">
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{!! $post->excerpt !!}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->category->term->name }}</td>
                    <td>{{ date('d/m/Y', strtotime($post->created_at)) }}</td>
                    <td>{{ $post->views }}</td>
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
