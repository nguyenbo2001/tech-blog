<nav id="sidebar" class="col-md-3 ml-sm-auto col-lg-2">
  <ul class="list-unstyled components" id="sidebar-menu">
    <li @if(Route::currentRouteName() == 'admin.home') class="active" @endif>
        <a href="{{ route('home') }}">
            Home
        </a>
    </li>
    <li @if(Route::currentRouteName() == 'admin.terms.index') class="active" @endif>
        <a href="#termMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fas fa-home"></i>
            Thể Loại
        </a>
        <ul class="collapse list-unstyled" id="termMenu">
          <li>
            <a href="{{ route('admin.terms.index') }}">Danh Sách</a>
          </li>
          <li>
            <a href="{{ route('admin.terms.create') }}">Thêm Thể Loại</a>
          </li>
        </ul>
    </li>
    <li @if(Route::currentRouteName() == 'admin.categories.index') class="active" @endif>
        <a href="#categoriesMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fas fa-home"></i>
            Loại Tin
        </a>
        <ul class="collapse list-unstyled" id="categoriesMenu">
          <li>
            <a href="{{ route('admin.categories.index') }}">Danh Sách</a>
          </li>
          <li>
            <a href="{{ route('admin.categories.create') }}">Thêm Loại Tin</a>
          </li>
        </ul>
    </li>
    <li @if(Route::currentRouteName() == 'admin.posts.index') class="active" @endif>
        <a href="#postsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fas fa-home"></i>
            Tin Tức
        </a>
        <ul class="collapse list-unstyled" id="postsMenu">
          <li>
            <a href="{{ route('admin.posts.index') }}">Danh Sách</a>
          </li>
          <li>
            <a href="{{ route('admin.posts.create') }}">Thêm Tin Tức</a>
          </li>
        </ul>
    </li>
    <li @if(Route::currentRouteName() == 'admin.users.index') class="active" @endif>
        <a href="#usersMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fas fa-home"></i>
            Users
        </a>
        <ul class="collapse list-unstyled" id="usersMenu">
          <li>
            <a href="{{ route('admin.users.index') }}">Danh Sách</a>
          </li>
          <li>
            <a href="{{ route('admin.users.create') }}">Thêm Người dùng</a>
          </li>
        </ul>
    </li>
</ul>
</nav>
