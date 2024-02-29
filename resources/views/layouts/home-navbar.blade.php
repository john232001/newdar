<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">DAR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 p-2">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active':'' }}" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('about') ? 'active':'' }}" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('darleaders') ? 'active':'' }}" href="{{ route('darleaders') }}">DAR Leaders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('services') ? 'active':'' }}" href="{{ route('services') }}">Services</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('login' )}}">
                <button class="btn btn-outline-info" type="submit">Login</button>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>