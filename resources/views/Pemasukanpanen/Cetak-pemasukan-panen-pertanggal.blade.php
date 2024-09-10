<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial -scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
         /* table.static{
            position: relative; */
            /* left: 3%; */
            /* border: 1px solid #543535;
        } */

        table {
                position: relative; 
                /* width: 100%; */
                border: 1px solid #543535;
            }

            th, td {
                padding: 5px;
                text-align: center;
            }

        /* th{  */
           /* background-color: blue;  Warna latar belakang untuk header tabel */
            /*color: black;  Warna teks untuk header tabel */
        /* } */

        </style>
        <title>Ewak Pond</title>
    </head>
    <body>
        <div class="form-group">
            <h2 align="center"><b>Laporan Data Pemasukan Hasil Panen</b></h2>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tanggal Panen</th>
        <th scope="col">Nama Kolam (Nama Ikan)</th>
        <th scope="col">Hasil Panen (ton)</th>
        <th scope="col">Harga/kg</th>
        <th scope="col">Pemasukan Kotor</th>
        <th scope="col">Biaya Bibit</th>
        <th scope="col">Biaya Pakan</th>
        <th scope="col">Pengeluaran Lainnya</th>
        <th scope="col">Pemasukan Bersih</th>
    </tr>
    </thead>
@foreach ($cetakPertanggal as $key => $item)
<tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ \Carbon\Carbon::parse($item->tanggal_panen)->format('d-m-Y') }}</td>
        <td>{{ $item->kolam->nama_kolam }} ({{ $item->kolam->nama_ikan }}) </td>
        <td>{{ $item->panen->total_berat }} ton</td>
        <td>Rp. {{ $item->harga_per_kg }} /kg</td>
        <td>Rp. {{ $item->pemasukan_kotor }}</td>
        <td>Rp. {{ $item->pengeluaran_bibit->total_biaya}}</td>
        <td>Rp. {{ $item->pengeluaran_pakan->total_biaya}}</td>
        <td>Rp. {{ $item->pengeluaran_lainnya ?? 0 }}</td>
        <td>Rp. {{ $item->pemasukan_bersih }}</td>
        <td>
    <td>
       
    </tr>
@endforeach
  </table>
</div>

<script type="text/javascript">
    window.print();
</script>

  </body>
</html>
