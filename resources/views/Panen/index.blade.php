@extends('layout.master')

@section('judul')
Daftar Data Panen
@endsection

@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<style>
.btn-primary {
        float: right; /* Memindahkan tombol ke kanan */
        margin-left: auto; /* Agar tombol benar-benar berada di kanan */
    }
  </style>
<script>
  $(function() {
    $('#example1').DataTable();
  });
</script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush

@section('content')
<a class="btn btn-secondary mb-3" href="/panen/create">Tambah Data Panen</a>
<!-- <a class="btn btn-primary mb-3" target="blank" href="/panen/cetak">Cetak Data Panen <i class="fas fa-print"></i></a> -->
<table class="table" id="example1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal Panen</th>
      <th scope="col">Jumlah Panen (Ikan)</th>
      <th scope="col">Total Berat Ikan (ton)</th>
      <th scope="col">Nama Ikan</th>
      <th scope="col">Nama Kolam</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($panen as $key => $item)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ \Carbon\Carbon::parse($item->tanggal_panen)->format('d-m-Y') }}</td>
      <td>{{ $item->jumlah_ikan }}</td>
      <td>{{ $item->total_berat }} ton</td>
      <td>{{ $item->ikan->nama_ikan }}</td>
      <td>{{ $item->kolam->nama_kolam }}</td>
      <td>
        <form action="/panen/{{ $item->id }}" method="POST" id="deleteForm">
          <a href="/panen/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
@endsection