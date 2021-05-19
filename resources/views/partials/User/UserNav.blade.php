
  
       
                    <li >

    <li class="nav-item active">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>

    <li class="nav-item">
        <a class="nav-link{{ Request::is('operations', 'operations/' . Auth::user()->id, 'operations/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/operations') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">My Submissions</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>

    <li class="nav-item">
        <a class="nav-link{{ Request::is('Viewed_Orders', 'Viewed_Orders/' . Auth::user()->id, 'Viewed_Orders/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('/Viewed_Orders') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Download Submission</span>
      </a>
    </li>

    <div class="dropdown-divider"></div>


                          
                    </li>
