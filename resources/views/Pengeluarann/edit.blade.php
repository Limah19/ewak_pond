@extends('layout.master')

@section('judul')
Edit Pengeluaran Pakan Ikan
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Form Edit Pengeluaran Pakan Ikan
    </div>
    <div class="card-body">
        <form action="/pengeluarann/{{ $pengeluarann->id }}" method="POST">
            @csrf
            @method('PUT') <!-- Method PUT untuk update data -->
            
            <div class="form-group">
                <label for="tanggal_pembelian">Tanggal Pembelian</label>
                <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" value="{{ $pengeluaran->tanggal_pembelian }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_pakan">Jenis Pakan</label>
                <input type="text" class="form-control" id="jenis_pakan" name="jenis_pakan" value="{{ $pengeluaran->jenis_pakan }}" placeholder="Masukkan jenis pakan" required>
            </div>
            <div class="form-group">
                <label for="jumlah_pakan">Jumlah Pakan (kg)</label>
                <input type="number" class="form-control" id="jumlah_pakan" name="jumlah_pakan" value="{{ $pengeluaran->jumlah_pakan }}" placeholder="Masukkan jumlah pakan" required>
            </div>
            <div class="form-group">
                <label for="harga_per">Harga per (kg)</label>
                <input type="number" class="form-control" id="harga_per" name="harga_per" value="{{ $pengeluaran->harga_per }}" placeholder="Masukkan harga per kg" required>
            </div>
            <div class="form-group">
                <label for="total_biaya">Total Biaya</label>
                <input type="number" class="form-control" id="total_biaya" name="total_biaya" value="{{ $pengeluaran->total_biaya }}" placeholder="Masukkan total biaya" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/pengeluarann" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
