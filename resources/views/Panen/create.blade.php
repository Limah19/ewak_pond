@extends('layout.master')

@section('judul')
Tambah Data Panen
@endsection

@section('content')
<div class="card" style="background-color: #99cdd8">
  <div class="card-header">
    <h3>Form Tambah Data Panen</h3>
  </div>
    <div class="card-body">
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
                <label>Jumlah Panen (Ikan)</label>
                <input type="number" name="jumlah_ikan" value="{{ old('jumlah_ikan') }}" class="form-control" placeholder="Masukkan Jumlah Ikan" required>
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
                <label>Total Berat Ikan (ton)</label>
                <input type="number" step="0.01" name="total_berat" value="{{ old('total_berat') }}" class="form-control" placeholder="Masukkan Total Berat Ikan (ton)" required>
            </div>
            @error('total_berat')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/panen" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection