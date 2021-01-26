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

      @foreach ($accesses as $access) 
        <li class="nav-item {{ ($active == $access->menu->name) ? 'nav-active' : '' }}">
          @include('components.nav.' . $access->menu->name)
        </li>
      @endforeach
  </ul>
</nav>