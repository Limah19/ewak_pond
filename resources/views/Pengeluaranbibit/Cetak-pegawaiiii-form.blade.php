<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ewak Pond</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

  @stack('style')
  <style>
  .card-info{
    align-items: center;
  }
  </style>
</head>

<body class="hold-transition sidebar-mini" >
  <!-- Site wrapper -->
  <div class="wrapper" >

    <!-- Navbar -->
    @include('partial.nav')
    <!-- /Navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #32373b; color: #FFF;">
      <!-- Brand Logo -->
      <a href="{{asset('admin/index3.html')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/EwakPondLogo.png')}}" alt="EwakPond Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Ewak Pond</span>
      </a>

      <!-- Sidebar -->
      @include('partial.sidebar')
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2128.12px;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
      </section>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <!-- <div class="card">
          <div class="card-header" style="background-color: #32373b; color: #fff;">
            <h1 class="card-title">
              <i class="fas fa-info-circle" ></i> @yield('judul')
            </h1> -->
<div class="content">
    <div class="card card-info card-outline">
        <H3>Halaman Cetak Pengeluaran Bibit</H3>
    </div>
</div>

<div class="car-body">
    <div class="input-group mb-3">
      <label for="label">Tanggal Awal</label>
          <input type="date" name="tglawal" id="tglawal" class="form-control"/>
      </div>
      <div class="input-group mb-3">
      <label for="label">Tanggal Akhir</label>
          <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
  </div>
  <!-- <div class="input-group mb-3">
  <button type="submit" class="btn btn-primary">Cetak</button>
</div>     -->

<a href="" onclick="this.href='/cetak-data-pertanggallll/'+ document.getElementById('tglawal').value +
 '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-info col-md-12">Cetak Laporan <i class="fas fa-print"></i></a>
            <!-- <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div> -->
          <div class="card-body">
            @yield('content')
          </div>
        </div>
        <!-- /.card-body -->
        <!-- /.row -->



      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <footer class="main-footer" style="background-color: #99cdd8; color: #32373b;" >
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2024 <a href="#">Ewak Pond</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('admin/dist/js/demo.js')}}"></script>
  <!-- Slick Carousel JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        dots: true
      });
    });
  </script>
  @include('sweetalert::alert')

  @stack('script')

</body>

</html>