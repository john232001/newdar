<nav class="navbar navbar-expand-lg navbar-light bg-light m-4 rounded-5 p-3">
  <div class="container-fluid">
    <img src="{{ asset('assets/img/dar-logo.png')}}" style="width: 50px;" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link {{ request()->routeIs('admin.home') ? 'active':'' }}" href="{{ route('admin.home') }}"> <i class="fa-solid fa-house"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('landholding') ? 'active':'' }}" href="{{ route('landholding') }}"> <i class="fa-solid fa-envelope"></i> Land Tenure Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('user_account') ? 'active':'' }}" href="{{ route('user_account') }}"> <i class="fa-solid fa-users"></i> Manage Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('officers') ? 'active':'' }}" href="{{ route('officers') }}"> <i class="fa-solid fa-user-tie"></i> Officers</a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
        <div class="dropdown">
          <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('assets/img/admin.png')}}" style="width: 25px" alt=""> {{ auth()->user()->username}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> <i class="fa-solid fa-power-off"></i> {{ __('Logout') }}
              </a>
            </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>