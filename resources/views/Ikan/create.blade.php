@extends('layout.master')

@section('judul')
Tambah Data Bibit Ikan
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    Form Tambah Data Bibit Ikan
  </div>
  <div class="card-body">
<form method="post" action="/ikan">
    @csrf
    
    <div class="form-group">
        <label>Nama Kolam</label>
        <select name="kolam_id" class="form-control">
            @foreach($kolam as $kolamItem)
                <option value="{{ $kolamItem->id }}">{{ $kolamItem->nama_kolam }}</option>
            @endforeach
        </select>
    </div>
    @error('kolam_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Nama Ikan</label>
        <input type="text" name="nama_ikan" value="" class="form-control" placeholder="Masukkan Nama Ikan" required>
    </div>
    @error('nama_ikan')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Jenis Ikan</label>
        <input type="text" name="jenis_ikan" value="" class="form-control"placeholder="Masukkan Jenis Ikan" required>
    </div>
    @error('jenis_ikan')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Jumlah Ikan</label>
        <input type="number" name="jumlah" value="Jumlah Ikan" class="form-control"placeholder="Masukkan Jumlah Ikan" required>
    </div>
    @error('jumlah')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="/ikan" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
