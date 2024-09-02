@extends('layout.master')

@section('judul')
Tambah Data Pengeluaran Untuk Bibit
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    Form Tambah Data
  </div>
  <div class="card-body">
    <form action="/pengeluaran" method="POST">
      @csrf
      <div class="form-group">
        <label for="tanggal_panen">Tanggal Pembelian</label>
        <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" required>
      </div>
      <div class="form-group">
        <label for="nama_ikannya">Nama Ikan</label>
        <input type="text" class="form-control" id="nama_ikan" name="nama_ikan" placeholder="Masukkan nama ikan" required>
      </div>
      <div class="form-group">
        <label for="harga_per">Jumlah Ikan</label>
        <input type="number" class="form-control" id="jumlah_ikan" name="jumlah_ikan" placeholder="Masukkan jumlah ikan yang dibeli" required>
      </div>
      <div class="form-group">
        <label for="harga_per">Harga per (ekor)</label>
        <input type="number" class="form-control" id="harga_per" name="harga_per" placeholder="Masukkan harga per ekor" required>
      </div>
      <div class="form-group">
        <label for="total_biaya">Total Biaya</label>
        <input type="number" class="form-control" id="total_biaya" name="total_biaya" placeholder="Masukkan total biaya" required>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="/pengeluaran" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
