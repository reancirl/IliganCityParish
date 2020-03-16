<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="/home">
      <h3 style="padding-top: 20px">DioceseOfIligan</h3> </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <ul class="navbar-nav">
      <li class="nav-item font-weight-semibold d-none d-lg-block">St. Michael the Archangel Parish Church</li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
         {{ Auth::user()->name }} 
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
            <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
          </div>
          <a class="dropdown-item" href="{{ route('users.index')}}">User Management</a>
          <a class="dropdown-item" href="#">Change Password</a>
          <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>