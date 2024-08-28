<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('omv') ? 'active' : '' }}">
      <i class="nav-icon fa fa-folder" aria-hidden="true"></i>
      <p>
        Admin OMV's
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('omv.index') }}" class="nav-link">
          <p>OMV's</p>
        </a>
      </li>
    </ul>
</li>

