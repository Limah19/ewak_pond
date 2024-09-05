@extends('layout.master')

@section('judul')
Daftar Pengeluaran Pakan Ikan
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

@section('content')
<a class="btn btn-secondary mb-3" href="/pengeluaranpakan/create">Tambah Pengeluaran Pakan Ikan</a>
<table class="table" id="example1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal Pembelian</th>
      <th scope="col">Nama Kolam (Jumlah Ikan)</th>
      <th scope="col">Jumlah Pakan (kuintal)</th>
      <th scope="col">Harga/kg</th>
      <th scope="col">Total Biaya</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($pengeluaranpakan as $key => $item)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ \Carbon\Carbon::parse($item->tanggal_pembelian)->format('d-m-Y') }}</td>
      <td>{{ $item->kolam->nama_kolam }} ({{ $item->kolam->jumlah_ikan }} ikan)</td>
      <td>{{ $item->pakan->jumlah_pakan }} kuintal</td> <!-- Mengambil jumlah pakan dari model Pakan -->
      <td>Rp. {{ $item->harga_pakan_per_kg }} /kg</td>
      <td>Rp. {{ $item->total_biaya }}</td>
      <td>
        <form action="/pengeluaranpakan/{{ $item->id }}" method="POST" id="deleteForm">
          <a href="/pengeluaranpakan/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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