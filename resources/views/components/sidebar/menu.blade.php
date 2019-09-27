<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  @component('components.sidebar.link')
    @slot('roles')
      {{ Auth::user()->role }}
    @endslot
    @slot('parent')
      null
    @endslot
  @endcomponent
</ul>
