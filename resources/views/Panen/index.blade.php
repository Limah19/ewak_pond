@extends('layout.master')

@section('judul')
Daftar Panen
@endsection

@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script>
  $(function() {
    $('#example1').DataTable({
      "columnDefs": [{
          "orderable": false,
          "targets": 7 // Update the column index for Action column
        } // Disable sorting on Action column
      ]
    });
  });
</script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush


@section('content')
<a class="btn btn-secondary mb-3" href="/panen/create">Tambah Data Panen</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal Panen</th>
      <th scope="col">Jumlah Ikan</th>
      <th scope="col">Total Berat (kg)</th>
      <th scope="col">Nama Kolam</th>
      <th scope="col">Nama Ikan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($panen as $key => $item)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ \Carbon\Carbon::parse($item->tanggal_panen)->format('d-m-Y') }}</td>
      <td>{{ $item->jumlah_ikan }}</td>
      <td>{{ $item->total_berat }} kg</td>
      <td>{{ $item->kolam->nama_kolam }}</td>
      <td>{{ $item->ikan->nama_ikan }}</td>
      <td>
        <form action="/panen/{{ $item->id }}" method="POST">
          <a href="/panen/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
