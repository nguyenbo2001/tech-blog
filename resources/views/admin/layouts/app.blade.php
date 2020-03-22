
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Trang Quản Trị</title>
    <base href="{{ asset('/') }}" />
    <link rel="stylesheet" href="css/app.css" type="text/css"/>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    @yield('css')
    @yield('header-scripts')
  </head>
  <body>
    @include('admin.layouts.header')

    @include('admin.layouts.modal')

    <div class="container-fluid">
      <div class="row">
        @include('admin.layouts.sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pt-3 pb-5">
          @yield('content')
        </main>
      </div>
    </div>
    <script src="js/admin.js"></script>
  </body>
</html>
