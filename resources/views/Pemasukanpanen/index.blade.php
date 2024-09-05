@extends('layout.master')

@section('judul')
Daftar Pemasukan Panen
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
</style>

@section('content')
<a class="btn btn-secondary mb-3" href="/pemasukanpanen/create">Tambah Pemasukan Panen</a>
<div class="table-responsive">
  <table id="example1" class="table table-bordered table-striped">
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
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($pemasukanPanen as $key => $item)
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
          <form action="/pemasukanpanen/{{ $item->id }}" method="POST" id="deleteForm">
            <a href="/pemasukanpanen/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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