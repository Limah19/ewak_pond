@extends('layout.master')

@section('judul')
Tambah Panen
@endsection

@section('content')
<form method="post" action="/panen">
    @csrf
    <div class="form-group">
        <label>Tanggal Panen</label>
        <input type="date" name="tanggal_panen" value="{{ old('tanggal_panen') }}" class="form-control">
    </div>
    @error('tanggal_panen')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Jumlah Ikan</label>
        <input type="number" name="jumlah_ikan" value="{{ old('jumlah_ikan') }}" class="form-control">
    </div>
    @error('jumlah_ikan')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Kolam</label>
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
        <select name="ikan_id" class="form-control">
            @foreach($ikan as $ikanItem)
                <option value="{{ $ikanItem->id }}">{{ $ikanItem->nama_ikan }}</option>
            @endforeach
        </select>
    </div>
    @error('ikan_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Total Berat (kg)</label>
        <input type="number" step="0.01" name="total_berat" value="{{ old('total_berat') }}" class="form-control">
    </div>
    @error('total_berat')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection