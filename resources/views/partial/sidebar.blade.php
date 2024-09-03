<div class="sidebar">
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="/beranda" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Beranda
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/owner" class="nav-link">
          <i class="nav-icon fas fa-user-tie"></i>
          <p>
            Owner
            <span class="right badge badge-danger"></span>
          </p>
        </a>
      </li>
      @if (auth()->user()->level=="admin")
      <li class="nav-item">
        <a href="/keuangan" class="nav-link">
          <i class="nav-icon fas fa-wallet"></i>
          <p>
          Keuangan
            <span class="right badge badge-danger"></span>
          </p>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a href="{{route('logout')}}" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
          Logout
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>