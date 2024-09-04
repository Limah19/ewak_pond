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

@section('content')
<a class="btn btn-secondary mb-3" href="/pengeluaran-pakan/create">Tambah Pengeluaran Bibit Ikan</a>
<table id="example1" class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal Pembelian</th>
      <th scope="col">Nama Kolam</th>
      <th scope="col">Nama Ikan</th>
      <th scope="col">Jumlah Ikan</th>
      <th scope="col">Harga per Ekor</th>
      <th scope="col">Total Biaya</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($pengeluaran as $key => $item)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ \Carbon\Carbon::parse($item->tanggal_pembelian)->format('d-m-Y') }}</td>
      <td>{{ $item->nama_kolam }}</td>
      <td>{{ $item->nama_ikan }}</td>
      <td>{{ $item->jumlah_ikan }}</td>
      <td>{{ $item->harga_per }} /ekor</td>
      <td>{{ $item->total_biaya }}.000</td>
      <td>
        <form action="/pengeluaran/{{ $item->id }}" method="POST">
          <a href="/pengeluaran/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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