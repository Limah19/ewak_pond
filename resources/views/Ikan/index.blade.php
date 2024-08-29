@extends('layout.master')

@section('judul')
Daftar Ikan
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
<a class="btn btn-secondary mb-3" href="/ikan/create">Tambah Data Ikan</a>
<table class="table" id="example1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Ikan</th>
      <th scope="col">Jenis Ikan</th>
      <th scope="col">Jumlah Ikan</th>
      <th scope="col">Berat Rata-Rata (kg)</th>
      <th scope="col">Nama Kolam</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($ikan as $key => $item)
    <tr>
      <td>{{$key + 1}}</td>
      <td>{{$item->nama_ikan}}</td>
      <td>{{$item->jenis_ikan}}</td>
      <td>{{$item->jumlah}}</td>
      <td>{{$item->berat_rata_rata}}</td>
      <td>{{$item->kolam->nama_kolam}}</td>
      <td>
        <form action="/ikan/{{ $item->id }}" method="POST" id="deleteForm">
            <a href="/ikan/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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