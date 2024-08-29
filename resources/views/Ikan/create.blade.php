@extends('layout.master')

@section('judul')
Tambah Ikan
@endsection

@section('content')
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
        <input type="text" name="nama_ikan" value="" class="form-control">
    </div>
    @error('nama_ikan')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Jenis Ikan</label>
        <input type="text" name="jenis_ikan" value="" class="form-control">
    </div>
    @error('jenis_ikan')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Jumlah Ikan</label>
        <input type="number" name="jumlah" value="" class="form-control">
    </div>
    @error('jumlah')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Berat Rata-Rata (kg)</label>
        <input type="number" name="berat_rata_rata" step="0.01" value="" class="form-control">
    </div>
    @error('berat_rata_rata')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
