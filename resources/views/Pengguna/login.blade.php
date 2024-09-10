
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EwakPond</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>

<style>
.login-box {
      margin-bottom: 10px; /* Adjust this value as needed */
    }

.logo-atas{
    text-align: center;
    margin-bottom: 5px;
  }

.logo-bawah {
      display: flex;
      justify-content: center; /* Center images horizontally */
      gap: 20px; /* Space between images */
      margin-top: 5px; /* Space from the element above */
    }
/* Warna latar belakang tombol Sign Up */
.btn-primary {
    background-color: #007bff; /* Ganti dengan warna yang Anda inginkan */
    color: #ffffff; /* Warna teks di dalam tombol */
    border: none; /* Menghilangkan border default */
    padding: 10px 20px; /* Ukuran padding dalam tombol */
    cursor: pointer; /* Menambahkan kursor pointer saat hover */
}

/* Warna tombol saat hover (ketika mouse diarahkan ke tombol) */
.btn-primary {
    background-color: #99cdd8; /* Ganti dengan warna yang Anda inginkan saat hover */
    color: #ffffff; /* Warna teks saat hover */
}
/* resources/css/app.css */
.login-page {
    background-color: #99cdd8; /* Ganti dengan kode warna yang diinginkan */
    /* min-height: 100vh; Agar background menutupi seluruh tinggi halaman */ 
    align-items: center;
    justify-content: center;
}

  </style>


<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>MANAJEMEN DATA ADMISISTRASI Peternak Ikan Tawar</b></a>
  </div>
  <!-- /.login-logo -->

<!-- logo atas -->
<div class="logo-atas">
<img src="{{ asset('admin/dist/img/EwakLogo.png') }}" alt="Ewak Logo" style="width: 130px;">
</div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{route('postlogin')}}" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
      <!-- /.col -->
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Gambar di bawah form login -->
<div class="logo-bawah">
<img src="{{ asset('admin/dist/img/UTILogo.png') }}" alt="UTI Logo" style="width: 50px;">
<img src="{{ asset('admin/dist/img/WuriLogo.png') }}" alt="Wuri Logo" style="width: 50px;">

      </div>
<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>



</body>
</html>
