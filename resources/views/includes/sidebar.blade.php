<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="text-wrapper">
          <p class="profile-name">{{ Auth::user()->email }}</p>
          <p class="designation">Admin</p>
        </div>
      </a>
    </li>
    <li class="nav-item nav-category">Main Menu</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home') }}">
        <i class="menu-icon typcn typcn-home-outline"></i>
        <span class="menu-title">Home</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('baptismal.index') }}">
        <i class="menu-icon typcn typcn-document"></i>
        <span class="menu-title">Baptismal</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('confirmation.index') }}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Confirmation</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('marriage.index') }}">
        <i class="menu-icon typcn typcn-bell"></i>
        <span class="menu-title">Marriage</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="menu-icon typcn typcn-user-outline"></i>
        <span class="menu-title">Account</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/blank-page.html"> View Accounts </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/blank-page.html"> Change Password </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
              Logout
            </a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>