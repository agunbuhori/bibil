<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="{{ asset('img/users/'.Auth::user()->picture) }}" class="user-image" alt="User Image">
    <span class="hidden-xs">{{ Auth::user()->name }}</i></span>
  </a>
  <ul class="dropdown-menu">
    <li class="user-header">
      <img src="{{ asset('img/users/'.Auth::user()->picture) }}" class="img-circle" alt="User Image">
      <p>
        {{ Auth::user()->name }}
        <small>{{ Auth::user()->role }}</small>
      </p>
    </li>
    <li class="user-footer">
      <div class="pull-left">
        <a href="{{route('profile-admin')}}" class="btn btn-default btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </li>
  </ul>
</li>