@foreach (Helpers::menus($roles, $parent) as $menu)
  @if ($menu->childs !== 0)
  <li class="treeview">
    <a href="#">
      <i class="{{ $menu->icons }}"></i> <span>{{ $menu->name }}</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      @component('components.sidebar.link')
        @slot('roles')
          {{ Auth::user()->role }}
        @endslot
        @slot('parent')
          {{ $menu->id }}
        @endslot
      @endcomponent
    </ul>
  </li>
  @else
  <li>
    <a href="{{ $menu->routes ? route($menu->routes) : '#' }}{{ $menu->params }}">
      <i class="{{ $menu->icons }}"></i> <span>{{ $menu->name }}</span>
    </a>
  </li>
  @endif
@endforeach