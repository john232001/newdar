<nav class="navbar navbar-expand-lg navbar-light bg-light m-4 rounded-5 p-3">
  <div class="container-fluid">
    <img src="{{ asset('assets/img/dar-logo.png')}}" style="width: 50px;" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link {{ request()->routeIs('staff.home') ? 'active':'' }}" href="{{ route('staff.home') }}"> <i class="fa-solid fa-house"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('staff_landholding') ? 'active':'' }}" href="{{ route('staff_landholding') }}"> <i class="fa-solid fa-envelope"></i> Land Tenure Services</a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
        <a class="btn btn-login btn-sm" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </div>
    </div>
  </div>
</nav>