<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap">
  <title>EwakPond | Login</title>
</head>
<style>
  .logo-bawah {
    display: flex;
    justify-content: center;
    /* Center images horizontally */
    gap: 20px;
    /* Space between images */
    /* Space from the element above */
    margin-bottom: 25px;

  }

  .tulisan {
    text-align: center;
    font-weight: bold;
    line-height: 0.5;
    font-size: 12;
  }

  .btn-lg {
    background-color: #99cdd8;
    /* Ganti dengan warna yang Anda inginkan saat hover */
    color: #32373b;
    /* Warna teks saat hover */
  }
</style>

<body>

  <!----------------------- Main Container -------------------------->

  <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

    <div class="row border rounded-5 p-3 bg-white shadow box-area">

      <!--------------------------- Left Box ----------------------------->

      <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #99cdd8;">
        <div class="featured-image mb-3">
          <img src="{{ asset('admin/dist/img/EwakLogo.png') }}" class="img-fluid" style="width: 130px;">
        </div>
        <h3 class="" style="font-family: 'Courier New', Courier, monospace; font-weight: 600; text-align:center;  color: #32373b;">Manajemen Administrasi</h3>
        <span class=" text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;  color: #32373b;">Peternak Ikan Tawar</span>
      </div>

      <!-------------------- ------ Right Box ---------------------------->

      <div class="col-md-6 right-box">
        <div class="row align-items-center">
          <div class="header-text mb-4">
          </div>
          @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $item)
              <li>{{ $item }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form action="" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="input-group mb-1">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="input-group mb-5 d-flex justify-content-between">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="formCheck">
                <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
              </div>
              <!-- </div> -->
              <div class="input-group mb-3">
                <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
              </div>
          </form>
        </div>

        <!-- Gambar di bawah form login -->
        <div class="logo-bawah">
          <img src="{{ asset('admin/dist/img/UTILogo.png') }}" alt="UTI Logo" style="width: 50px;">
          <img src="{{ asset('admin/dist/img/WuriLogo.png') }}" alt="Wuri Logo" style="width: 50px;">
        </div>
        <div class="tulisan">
          <p> &copy; 2023</p>
          <p> Universitas Teknokrat Indonesia</p>
          <p> Direktorat Jendral Pendidikan Tinggi</p>
          <p> Kementrian Pendidikan dan Kebudayaan Republik</p>
          <p> Indonesia</p>
        </div>
      </div>
    </div>


</body>

</html>