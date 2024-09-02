@extends('layout.master')

@section('judul')
Daftar Pemasukan Hasil Panen
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
<a class="btn btn-secondary mb-3" href="/pemasukann/create">Tambah Data Pemasukan Hasil Panen</a>
<table class="table" id="example1">
  <thead class="thead-dark">
    <tr>
    <th scope="col">#</th>
      <th scope="col">Tanggal Panen</th>
      <th scope="col">Nama Ikan</th>
      <th scope="col">Harga per (kg)</th>
      <th scope="col">Total Berat (kg)</th>
      <th scope="col">Total Pemasukan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($pemasukann as $key => $item)
    <tr>
    <td>{{ $key + 1 }}</td>
      <td>{{ \Carbon\Carbon::parse($item->tanggal_panen)->format('d-m-Y') }}</td>
      <td>{{ $item->nama_ikan}}</td>
      <td>{{ $item->harga_per }}</td>
      <td>{{ $item->total_berat }}</td>
      <td>{{ $item->total_pemasukan }}</td>
      <td>
        <form action="/pemasukann/{{ $item->id }}" method="POST" id="deleteForm">
            <a href="/pemasukann/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
        </form>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="7"><h4>Data tidak ada</h4></td>
    </tr>
    @endforelse
  </tbody>
</table>
@endsection
