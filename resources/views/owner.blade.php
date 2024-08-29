@extends('layout.master')

@section('judul')
Selamat Datang "Rizky Maulana"
@endsection

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EwakPond</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        <!--.content-box {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }-->

        .stat-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Deskripsi -->
    <div class="content-box">
        <h3>Rizky Maulana adalah salah satu pengelola operasional di Ewak Pond.</h3>
        <h6>Sebagai pengelola operasional, Bapak Rizky bertanggung jawab atas koordinasi dan pengawasan berbagai aktivitas yang terkait dengan produksi ikan, termasuk pengelolaan pakan, perawatan kolam, dan pemantauan kesehatan ikan. Beliau juga terlibat dalam pengembangan dan penerapan prosedur operasional standar untuk memastikan efisiensi dan kualitas produksi.</h6>
    </div> 

    <!-- Statistik -->
    <div class="stat-box">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <div class="icon">
                            <i class="fas fa-water"></i>
                        </div>
                        <h3>Kolam</h3>
                    </div>
                    <a href="/kolam" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <div class="icon">
                            <i class="fas fa-fish"></i>
                        </div>
                        <h3>Ikan</h3>
                    </div>
                    <a href="/ikan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <div class="icon">
                            <i class="fas fa-cookie-bite"></i>
                        </div>
                        <h3>Pakan</h3>
                    </div>
                    <a href="/pakan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <h3>Panen</h3>
                    </div>
                    <a href="/panen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</body>

</html>
@endsection