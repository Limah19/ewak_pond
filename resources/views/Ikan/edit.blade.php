@extends('layout.master')

@section('judul')
Edit Data Bibit Ikan
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Form Edit Data Bibit Ikan
    </div>
    <div class="card-body">
        <form method="post" action="/ikan/{{ $ikan->id }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Kolam</label>
                <select name="kolam_id" class="form-control">
                    @foreach($kolam as $kolamItem)
                    <option value="{{ $kolamItem->id }}" {{ $ikan->kolam_id == $kolamItem->id ? 'selected' : '' }}>
                        {{ $kolamItem->nama_kolam }}
                    </option>
                    @endforeach
                </select>
            </div>
            @error('kolam_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Nama Ikan</label>
                <input type="text" name="nama_ikan" value="{{ $ikan->nama_ikan }}" class="form-control">
            </div>
            @error('nama_ikan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Jenis Ikan</label>
                <input type="text" name="jenis_ikan" value="{{ $ikan->jenis_ikan }}" class="form-control">
            </div>
            @error('jenis_ikan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Jumlah Ikan</label>
                <input type="number" name="jumlah" value="{{ $ikan->jumlah }}" class="form-control">
            </div>
            @error('jumlah')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/ikan" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection