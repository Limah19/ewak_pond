@extends('layout.master')

@section('judul')
<!-- Selamat Datang "Rizky Maulana" -->
Selamat Datang "{{ Auth::user()->name }}"
@endsection

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .content-box {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .stat-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .custom-box-icon {
            background-color: #32373b;
            /* Warna default */
            color: #fff;
            /* Warna ikon atau teks di dalamnya */
        }
    </style>
</head>

<body>
    <!-- Deskripsi -->
    <!-- <div class="content-box">
        <h3>Rizky Maulana adalah salah satu pengelola operasional di Ewak Pond.</h3>
        <h6>Sebagai pengelola operasional, Bapak Rizky bertanggung jawab atas koordinasi dan pengawasan berbagai aktivitas yang terkait dengan produksi ikan, termasuk pengelolaan pakan, perawatan kolam, dan pemantauan kesehatan ikan. Beliau juga terlibat dalam pengembangan dan penerapan prosedur operasional standar untuk memastikan efisiensi dan kualitas produksi.</h6>
    </div>  -->

    <!-- Statistik -->
    <!-- <div class="stat-box"> -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="background-color: #99cdd8;">
                <span class="info-box-icon custom-box-icon elevation-1">
                    <i class="fas fa-chart-line"></i>
                </span>
                <div class="info-box-content">
                    <h4>Pemasukan</h4>
                    <span class="info-box-number">
                        Hasil Panen
                    </span>
                    <a href="/pemasukann" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-color: #99cdd8;">
                <span class="info-box-icon custom-box-icon elevation-1">
                    <i class="fas fa-chart-bar"></i>
                </span>
                <div class="info-box-content">
                    <h4>Pengeluaran</h4>
                    <span class="info-box-number">Pakan Ikan</span>
                    <a href="/pengeluarann" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-color: #99cdd8;">
                <span class="info-box-icon custom-box-icon elevation-1">
                    <i class="fas fa-fish"></i>
                </span>

                <div class="info-box-content">
                    <h4>Pengeluaran</h4>
                    <span class="info-box-number">Bibit Ikan</span>
                    <a href="/pengeluaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>

</body>

</html>
@endsection