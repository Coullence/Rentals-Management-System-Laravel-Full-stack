
  
    <li >
    <li class="nav-item active">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>

    <li class="nav-item">
        <a class="nav-link{{ Request::is('operations', 'operations/' . Auth::user()->id, 'operations/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/all_announcements') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Announcements </span>
      </a>
    </li>
    <div class="dropdown-divider"></div>

    <li class="nav-item">
        <a class="nav-link{{ Request::is('operations', 'operations/' . Auth::user()->id, 'operations/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/all_blogs') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Blogs</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>



                          
                    </li>
