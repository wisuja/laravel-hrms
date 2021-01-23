<nav id="sidebar" class="navbar-nav">
  <div class="sidebar-header">
    <a class="navbar-brand text-white" href="{{ url('/dashboard') }}">
        <h3> {{ config('app.name', 'Laravel') }}</h3>
    </a>
  </div>
  <ul class="list-unstyled components">
      <div class="d-flex justify-content-center align-items-center my-3">
          <img src="{{ asset('images/profile.png') }}" alt="profile-picture" class="rounded-circle w-50">
      </div>
      <div class="d-flex justify-content-center align-items-center ">
          <h3>Hello, <b>{{ auth()->user()->name }}</b>!</h3>
      </div>
      <li class="active nav-item">

          <a href="#" class="nav-link">
              <i class="fas fa-tachometer-alt mr-2"></i>
              Dashboard
          </a>
      </li>
      <li class="nav-item">
          <a href="#dataSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fas fa-database mr-2"></i>
              Data
          </a>
          <ul class="collapse list-unstyled" id="dataSubmenu">
              <li class="nav-item">
                  <a href="#" class="nav-link">Employees</a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">Departments</a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">Positions</a>
              </li>
          </ul>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="fas fa-chart-line mr-2"></i>
              Employees' Performance Score
          </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="fas fa-walking mr-2"></i>
              Employees' Leave
          </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="fas fa-calendar-check mr-2"></i>
              Attendance
          </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="fas fa-bullhorn mr-2"></i>
              Announcements
          </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">                    
              <i class="fas fa-briefcase mr-2"></i>
              Recruitments
          </a>
      </li>
      <li class="nav-item">
          <a href="#accountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fas fa-users mr-2"></i>
              Accounts
          </a>
          <ul class="collapse list-unstyled" id="accountSubmenu">
              <li class="nav-item">
                  <a href="#" class="nav-link">Users</a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">Roles</a>
              </li>
          </ul>
      </li>
      <li class="nav-item">
          <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">                    
              <i class="fas fa-user-alt mr-2"></i>
              {{ auth()->user()->name }}
          </a>
          <ul class="collapse list-unstyled" id="userSubmenu">
              <li class="nav-item">
                  <a href="#" class="nav-link">Profile</a>
              </li>
              <li>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li>
          </ul>
      </li>
  </ul>
</nav>