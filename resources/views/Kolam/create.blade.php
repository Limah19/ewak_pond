@extends('layout.master')

@section('judul')
Tambah Data Kolam
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    Form Tambah Data Kolam
  </div>
  <div class="card-body">
    <form method="post" action="/kolam">
      @csrf
      <div class="form-group">
        <label>Nama Kolam</label>
        <input type="text" name="nama_kolam" value="{{ old('nama_kolam') }}" class="form-control" placeholder="Masukkan Nama Kolam" required>
      </div>
      @error('nama_kolam')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-group">
        <label>Ukuran Kolam (m<sup>2</sup>)</label>
        <input type="number" name="ukuran_kolam" step="0.01" value="{{ old('ukuran_kolam') }}" class="form-control" placeholder="Masukkan Ukuran Kolam" required>
      </div>
      @error('ukuran_kolam')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-group">
        <label>Jenis Kolam</label>
        <input type="text" name="jenis_kolam" value="{{ old('jenis_kolam') }}" class="form-control" placeholder="Masukkan Jenis Kolam" required>
      </div>
      @error('jenis_kolam')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-group">
        <label>Kapasitas (Ikan)</label>
        <input type="number" name="kapasitas" value="{{ old('kapasitas') }}" class="form-control" placeholder="Masukkan Kapasitas (Ikan)" required>
      </div>
      @error('kapasitas')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
          <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif </option>
          <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
      </div>
      @error('status')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="/kolam" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection