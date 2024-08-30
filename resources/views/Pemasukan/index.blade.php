@extends('layout.master')

@section('judul')
Daftar Pemasukan
@endsection

@push('script')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
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
<a class="btn btn-secondary mb-3" href="/pemasukan/create">Tambah Data Pemasukan</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal Panen</th>
      <th scope="col">Nama Ikannya</th>
      <th scope="col">Harga per (kg)</th>
      <th scope="col">Total Berat (kg)</th>
      <th scope="col">Pemasukan Kotor</th>
      <th scope="col">Total Biaya</th>
      <th scope="col">Pemasukan Bersih</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($pemasukan as $key => $item)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ \Carbon\Carbon::parse($item->tanggal_panen)->format('d-m-Y') }}</td>
      <td>{{ $item->nama_ikannya}}</td>
      <td>{{ $item->harga_per }} kg</td>
      <td>{{ $item->total_berat }} kg</td>
      <td>{{ $item->pemasukan_kotor }} kg</td>
      <td>{{ $item->total_biaya }}</td>
      <td>{{ $item->pemasukan_bersih }}</td>
      <td>
        <form action="/pemasukan/{{ $item->id }}" method="POST">
          <a href="/pemasukan/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
          @csrf
          @method('delete')
          <button type="submit" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
        </form>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="6" class="text-center">Data tidak ada</td>
    </tr>
    @endforelse
  </tbody>
</table>
@endsection
