@extends('layout.master')

@section('judul')
Edit Kolam
@endsection

@section('content')
<form method="post" action="/kolam/{{ $kolam->id }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama Kolam</label>
        <input type="text" name="nama_kolam" value="{{ $kolam->nama_kolam }}" class="form-control">
    </div>
    @error('nama_kolam')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Ukuran Kolam (m<sup>2</sup>)</label>
        <input type="number" name="ukuran_kolam" step="0.01" value="{{ $kolam->ukuran_kolam }}" class="form-control">
    </div>
    @error('ukuran_kolam')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1" {{ $kolam->status ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ !$kolam->status ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
    </div>
    @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endsection
