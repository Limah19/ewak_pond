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
      <li class="nav-item has-treeview menu-open">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
              Administrasi
              <i class="right fas fa-angle-left"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if(Auth::user()->level == 'admin' || Auth::user()->level == 'karyawan')
              <li class="nav-item">
                <a href="/administrasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Administrasi</p>
                </a>
              </li>
              @endif
              @if(Auth::user()->level == 'admin' || Auth::user()->level == 'user')
              <li class="nav-item">
                <a href="/administrasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Administrasi</p>
                </a>
              </li>
              @endif
            </ul>
      
            <li class="nav-item has-treeview menu-open">
            <a href="/keuangan" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
              Keuangan
              <i class="right fas fa-angle-left"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">
            @if(Auth::user()->level == 'admin' || Auth::user()->level == 'karyawan')
            <li class="nav-item">
                <a href="/keuangan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Keuangann </p>
                </a>
              </li>
              @endif
              @if(Auth::user()->level == 'admin' || Auth::user()->level == 'user')
              <li class="nav-item">
                <a href="/keuangan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Keuangan </p>
                </a>
              </li>
              @endif
            </ul>

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