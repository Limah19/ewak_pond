@extends('layout.master')

@section('judul')
Tambah Kolam
@endsection

@section('content')
<form method="post" action="/kolam">
    @csrf
    <div class="form-group">
        <label>Nama Kolam</label>
        <input type="text" name="nama_kolam" value="" class="form-control">
    </div>
    @error('nama_kolam')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Ukuran Kolam (m<sup>2</sup>)</label>
        <input type="number" name="ukuran_kolam" step="0.01" value="" class="form-control">
    </div>
    @error('ukuran_kolam')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
        </select>
    </div>
    @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
