@extends('layout.master')

@section('judul')
Daftar Data Pakan
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
<a class="btn btn-secondary mb-3" href="/pakan/create">Tambah Data Pakan</a>
<table class="table" id="example1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Pakan</th>
      <th scope="col">Jenis Pakan</th>
      <th scope="col">Jumlah Pakan (kuintal)</th>
      <th scope="col">Nama Kolam</th> <!-- Updated header for Kolam -->
      <th scope="col">Nama Ikan</th>
      <th scope="col">Tanggal Pemberian</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($pakan as $key => $item)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ $item->nama_pakan }}</td>
      <td>{{ $item->jenis_pakan }}</td>
      <td>{{ $item->jumlah }} kuintal</td>
      <td>{{ $item->kolam->nama_kolam }}</td> <!-- Display Kolam name -->
      <td>{{ $item->ikan->nama_ikan }}</td> <!-- Display ikan name from related Ikan model -->
      <td>{{ \Carbon\Carbon::parse($item->tanggal_pemberian)->format('d-m-Y') }}</td>
      <td>
        <form action="/pakan/{{ $item->id }}" method="POST" id="deleteForm">
          <a href="/pakan/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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