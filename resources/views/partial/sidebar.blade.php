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
        <a href="/administrasi" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Administrasi
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/keuangan" class="nav-link">
          <i class="nav-icon fas fa-wallet"></i>
          <p>
            Keuangan
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/" class="nav-link">
          <i class="nav-icon fas fa-clipboard"></i>
          <p>
            Cetak Laporan
            <i class="right fas fa-angle-right"></i>
          </p>
        </a>
        <ul class="nav-treeview">
          <li class="nav-item">
            <a href="{{ route('cetak-data-pegawai-form') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Data Pakan
              </p>
            </a>
          <li class="nav-item">
            <a href="{{ route('cetak-data-pegawaii-form') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Data Panen
              </p>
            </a>
          <li class="nav-item">
            <a href="{{ route('cetak-data-pegawaiii-form') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                P.Hasil Panen
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cetak-data-pegawaiiii-form') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Pengeluaran Bibit
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cetak-data-pegawaiiiii-form') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pengeluaran Pakan</p>
            </a>
          </li>
        </ul>
      <!-- <li class="nav-item">
        <a href="/profile" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Profil
          </p>
        </a>
      </li> -->
      <li class="nav-item">
        <a href="/logout" class="nav-link">
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