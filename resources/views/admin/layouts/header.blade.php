<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow flex-md-nowrap">
  <a href="{{ url('admin') }}" class="navbar-brand">Trang Quản Trị</a>
  <button class="navbar-toggler" type="button" data-toggler="collapse" data-target="navbarSupportedContent" aria-control="navbarSupportedContent" aria-expanded="false">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('admin.users.edit', auth()->user()) }}">Chỉnh sửa thông tin</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
    </ul>
  </div>
</nav>
