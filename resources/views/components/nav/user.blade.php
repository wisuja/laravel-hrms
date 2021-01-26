<a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">                    
    <i class="fas fa-user-alt mr-2"></i>
    {{ auth()->user()->name }}
</a>
<ul class="collapse list-unstyled" id="userSubmenu">
    <li class="nav-item">
        <a href={{ route('profile') }} class="nav-link">Profile</a>
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