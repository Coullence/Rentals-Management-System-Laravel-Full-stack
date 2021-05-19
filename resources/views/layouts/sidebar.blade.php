<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url('assets/images/faces/face8.jpg') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Richard V.Welsh</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">


                @role('admin')
                <small class="designation text-muted">Admin access</small>
                @endrole
                @role('user')
                <small class="designation text-muted">User access</small>
                @endrole


                <span class="status-indicator online"></span>
              </a>
            </div>
          </div>
        </div>
        <button class="btn btn-success btn-block">New Project <i class="mdi mdi-plus"></i>
        </button>
      </div>
    </li>



                @role('admin')
                     @include('partials.Admin.AdminNav')
                @endrole
                @role('captain')
                     @include('partials.Captain.CaptainNav')
                @endrole
                @role('player')
                     @include('partials.Player.PlayerNav')
                @endrole
                @role('user')
                     @include('partials.User.UserNav')
                @endrole
  </ul>
</nav>