
  
    <li >
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>

    <li class="nav-item">
        <a class="nav-link{{ Request::is('operations', 'New_Users/' . Auth::user()->id, 'captains/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/New_Users') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">New Users Management</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>

    <li class="nav-item">
        <a class="nav-link{{ Request::is('operations', 'captains/' . Auth::user()->id, 'captains/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/captains') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Captains Management</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>

    <li class="nav-item">
        <a class="nav-link{{ Request::is('null', 'null/' . Auth::user()->id, 'null/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/players') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Players Management</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>

    <li class="nav-item">
        <a class="nav-link{{ Request::is('null', 'null/' . Auth::user()->id, 'null/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/blogs') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Manage Blogs</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>

    <li class="nav-item">
        <a class="nav-link{{ Request::is('operations', 'operations/' . Auth::user()->id, 'operations/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/announcements') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Manage Announments</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>



                          
                    </li>
