@extends('layout.master')

@section('judul')
Daftar Data Bibit Ikan
@endsection

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/r-2.5.0/datatables.min.css" rel="stylesheet">
@endpush

@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/r-2.5.0/datatables.min.js"></script>
<script>
  $(function() {
    $('#example1').DataTable({
      responsive: true
    });
  });
</script>
@endpush
<style>
  .table-responsive {
    overflow-x: auto;
  }

  .btn-primary {
    float: right;
    /* Memindahkan tombol ke kanan */
    margin-left: auto;
    /* Agar tombol benar-benar berada di kanan */
  }
</style>

@section('content')
<a class="btn btn-secondary mb-3" href="/ikan/create">Tambah Data Bibit Ikan</a>
<!-- <a class="btn btn-primary mb-3" target="blank" href="/ikan/cetak">Cetak Data Bibit Ikan <i class="fas fa-print"></i></a> -->
<div class="table-responsive">
  <table id="example1" class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Bibit Ikan</th>
        <th scope="col">Jenis Bibit Ikan</th>
        <th scope="col">Jumlah Bibit Ikan</th>
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
</div>
@endsection