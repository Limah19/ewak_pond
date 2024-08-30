@extends('layout.master')

@section('judul')
Tambah Data Pemasukan
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    Form Tambah Data Pemasukan 
  </div>
  <div class="card-body">
    <form action="/pemasukan" method="POST">
      @csrf
      <div class="form-group">
        <label for="tanggal_panen">Tanggal Panen</label>
        <input type="date" class="form-control" id="tanggal_panen" name="tanggal_panen" required>
      </div>
      <div class="form-group">
        <label for="nama_ikannya">Nama Ikanya</label>
        <input type="text" class="form-control" id="nama_ikannya" name="nama_ikannya" placeholder="Masukkan nama ikan" required>
      </div>
      <div class="form-group">
        <label for="harga_per">Harga per (kg)</label>
        <input type="number" class="form-control" id="harga_per" name="harga_per" placeholder="Masukkan harga per kg" required>
      </div>
      <div class="form-group">
        <label for="total_berat">Total Berat (kg)</label>
        <input type="number" class="form-control" id="total_berat" name="total_berat" placeholder="Masukkan total berat" required>
      </div>
      <div class="form-group">
        <label for="pemasukan_kotor">Pemasukan Kotor</label>
        <input type="number" class="form-control" id="pemasukan_kotor" name="pemasukan_kotor" placeholder="Masukkan pemasukan kotor" required>
      </div>
      <div class="form-group">
        <label for="total_biaya">Total Biaya</label>
        <input type="number" class="form-control" id="total_biaya" name="total_biaya" placeholder="Masukkan total biaya" required>
      </div>
      <div class="form-group">
        <label for="pemasukan_bersih">Pemasukan Bersih</label>
        <input type="number" class="form-control" id="pemasukan_bersih" name="pemasukan_bersih" placeholder="Masukkan pemasukan bersih" required>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="/pemasukan" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
