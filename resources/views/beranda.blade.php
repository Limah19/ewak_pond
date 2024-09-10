@extends('layout.master')

@section('judul')
Selamat Datang di Ewak Pond "{{ Auth::user()->name }}"

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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header-container {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #99cdd8;
            border-radius: 10px;
        }

        .header-container img {
            margin-right: 20px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .text-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .text-container h1 {
            margin: 0;
            font-size: 40px;
            font-style: bold;
            color: #32373b;
        }

        .text-container h6 {
            margin: 0;
            font-size: 14px;
            color: #32373b;
        }

        .slider-container {
            margin: 20px auto;
            padding: 20px;
            max-width: 1200px;
            background-color: #99cdd8;;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .slider {
            display: flex;
            gap: 10px;
            /* Menambahkan jarak antar slide */
        }

        .slider img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            /* Menambahkan border-radius untuk efek sudut melengkung */
            /* Menambahkan margin di kanan setiap gambar */
            margin-right: 10px;
            /* Jarak antar gambar di slider */
        }

        .slider .slick-slide {
            margin: 0 10px;
            /* Menambahkan jarak horizontal antar gambar */
        }

        .slider .slick-slide {
            margin: 0 10px;
            /* Menambahkan jarak horizontal antar gambar */
        }
    </style>
</head>

<body>
    <div class="header-container">
        <img src="{{ asset('admin/dist/img/EwakPondLogo.png') }}" alt="EwakPond Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <div class="text-container">
            <h1>KELOMPOK BUDIDAYA IKAN</h1>
            <h6><b>Ewak Pond</b> merupakan kelompok budidaya kolam ikan tawar milik masyarakat setempat yang berlokasi di pekon patoman kecamatan pagelaran kabupaten pringsewu. Bapak Evran yang merupakan ketua kelompok dari ewak pond, ewak pond memiliki 14 anggota dengan jumlah 20 kolam ikan yang dibudidayakan yaitu terdiri dari ikan lele, ikan nila dan ikan gurame.</h6>
            <!-- Ingin ke halaman home, <a href="/dashboard">klik disini</a> -->
        </div>
    </div>

    <div class="slider-container">
        <div class="slider">
            <div><img src="{{ asset('admin/dist/img/photo10.jpeg') }}" alt="Image 1"></div>
            <div><img src="{{ asset('admin/dist/img/photo10.jpeg') }}" alt="Image 2"></div>
            <div><img src="{{ asset('admin/dist/img/photo10.jpeg') }}" alt="Image 3"></div>
            <div><img src="{{ asset('admin/dist/img/photo10.jpeg') }}" alt="Image 4"></div>
            <div><img src="{{ asset('admin/dist/img/photo10.jpeg') }}" alt="Image 5"></div>
        </div>
    </div>
</body>
</html>
@endsection