@extends('layout.master')

@section('judul')
Edit Pemasukan Hasil Panen
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    Form Edit Pemasukan Hasil Panen
  </div>
  <div class="card-body">
    <form action="/pemasukann/{{ $pemasukann->id }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="tanggal_panen">Tanggal Panen</label>
        <input type="date" class="form-control" id="tanggal_panen" name="tanggal_panen" value="{{ $pemasukann->tanggal_panen }}" required>
      </div>
      <div class="form-group">
        <label for="nama_ikan">Nama Ikan</label>
        <input type="text" class="form-control" id="nama_ikan" name="nama_ikan" value="{{ $pemasukann->nama_ikan }}" placeholder="Masukkan nama ikan" required>
      </div>
      <div class="form-group">
        <label for="harga_per">Harga per (kg)</label>
        <input type="number" class="form-control" id="harga_per" name="harga_per" value="{{ $pemasukann->harga_per }}" placeholder="Masukkan harga per kg" required>
      </div>
      <div class="form-group">
        <label for="total_berat">Total Berat (kg)</label>
        <input type="number" class="form-control" id="total_berat" name="total_berat" value="{{ $pemasukann->total_berat }}" placeholder="Masukkan total berat" required>
      </div>
      <div class="form-group">
        <label for="total_pemasukan">Total Pemasukan</label>
        <input type="number" class="form-control" id="total_pemasukan" name="total_pemasukan" value="{{ $pemasukann->total_pemasukan }}" placeholder="Masukkan total pemasukan" required>
      </div>
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      <a href="/pemasukann" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
