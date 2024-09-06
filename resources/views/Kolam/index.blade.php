@extends('layout.master')

@section('judul')
Daftar Data Kolam
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
        $(function(){
            $('#example1').DataTable();
        });
    </script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush



@section('content')
<a class="btn btn-secondary mb-3" href="/kolam/create">Tambah Data Kolam</a>
<a class="btn btn-primary mb-3" target="blank" href="/kolam/cetak">Cetak Data Kolam <i class="fas fa-print"></i></a>
<table class="table" id="example1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Kolam</th>
      <th scope="col">Ukuran Kolam (m<sup>2</sup>)</th>
      <th scope="col">Nama Ikan</th>
      <th scope="col">Jumlah Ikan</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($kolam as $key => $item)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ $item->nama_kolam }}</td>
      <td>{{ $item->ukuran_kolam }} m<sup>2</sup></td>
      <td>{{ $item->nama_ikan }}</td>
      <td>{{ $item->jumlah_ikan }}</td>
      <td>{{ $item->status ? 'Aktif' : 'Tidak Aktif' }}</td>
      <td>
        <form action="/kolam/{{ $item->id }}" method="POST" id="deleteForm">
            <a href="/kolam/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
