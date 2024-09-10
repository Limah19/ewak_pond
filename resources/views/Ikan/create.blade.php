@extends('layout.master')

@section('judul')
Tambah Data Bibit Ikan
@endsection

@section('content')
<div class="card" style="background-color: #99cdd8">
    <div class="card-header">
        <h3>Form Tambah Data Bibit Ikan</h3>
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
                <label>Nama Bibit Ikan</label>
                <input type="text" name="nama_ikan" value="" class="form-control" placeholder="Masukkan Nama Bibit Ikan" required>
            </div>
            @error('nama_ikan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Jenis Bibit Ikan</label>
                <input type="text" name="jenis_ikan" value="" class="form-control" placeholder="Masukkan Jenis Bibit Ikan" required>
            </div>
            @error('jenis_ikan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Jumlah Bibit Ikan</label>
                <input type="number" name="jumlah" value="Jumlah Ikan" class="form-control" placeholder="Masukkan Jumlah Bibit Ikan" required>
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