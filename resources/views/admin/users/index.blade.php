@extends('admin.layouts.app')

@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h1 class="page-header">Quản lý người dùng</h1>
          </div>
          <div class="card-body">
            <table class="table table-striped tabler-bordered table-hover w-100 dataTables" id="dataTables" data-form="deleteForm">
              <thead>
                <tr align="center">
                  <th class="text-center">STT</th>
                  <th class="text-center">Tên</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Role</th>
                  <th class="text-center">Ngày tạo</th>
                  <th class="text-center">Sửa</th>
                  <th class="text-center">Xóa</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr class="odd" align="center">
                    <td>{{ $loop->index }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if($user->role == 1)
                        {{ 'Admin' }}
                      @else
                        {{ 'User' }}
                      @endif
                    </td>
                    <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                    <td class="text-center"><i class="fa fa-pencil"></i><a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user) }}">Sửa</a></td>
                    <td class="text-center">
                      <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="form-inline form-delete">
                        @csrf()
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $user->id }}">
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
