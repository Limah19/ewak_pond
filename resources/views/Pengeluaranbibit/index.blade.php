@extends('layout.master')

@section('judul')
Daftar Pengeluaran Bibit Ikan
@endsection

@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script>
  $(function() {
    $('#example1').DataTable();
  });
</script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush

<style>
  .table-responsive {
    overflow-x: auto;
  }
.btn-primary {
        float: right; /* Memindahkan tombol ke kanan */
        margin-left: auto; /* Agar tombol benar-benar berada di kanan */
    }
</style>

@section('content')
<a class="btn btn-secondary mb-3" href="/pengeluaranbibit/create">Tambah Pengeluaran Bibit Ikan</a>
<!-- <a class="btn btn-primary mb-3" target="blank" href="/pengeluaranbibit/cetak">Cetak Data Pengeluaran Bibit Ikan <i class="fas fa-print"></i></a> -->
<div class="table-responsive">
  <table id="example1" class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tanggal Pembelian</th>
        <th scope="col">Nama Kolam</th>
        <th scope="col">Jumlah Bibit Ikan</th>
        <th scope="col">Harga/ekor</th>
        <th scope="col">Total Biaya</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($pengeluaranbibit as $key => $item)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ \Carbon\Carbon::parse($item->tanggal_pembelian)->format('d-m-Y') }}</td>
        <td>{{ $item->kolam->nama_kolam }}</td>
        <td>{{ $item->ikan->jumlah }} ({{ $item->ikan->nama_ikan }})</td>
        <td>Rp. {{ $item->harga_bibit_per_ekor }} /ekor</td>
        <td>Rp. {{ $item->total_biaya }}</td>
        <td>
          <form action="/pengeluaranbibit/{{ $item->id }}" method="POST" id="deleteForm">
            <a href="/pengeluaranbibit/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <h2>Data tidak ada</h2>
      @endforelse
    </tbody>
  </table>
</div>
@endsection