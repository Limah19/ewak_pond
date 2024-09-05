@extends('layout.master')

@section('judul')
Edit Pengeluaran Pakan Ikan
@endsection

@section('content')
<div class="card" style="background-color: #99cdd8">
    <div class="card-header">
        <h3>Form Edit Pengeluaran Pakan Ikan</h3>
    </div>
    <div class="card-body">
        <form action="/pengeluaranpakan/{{ $pengeluaranpakan->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Kolam</label>
                <select name="kolam_id" class="form-control">
                    @foreach($kolam as $kolamItem)
                    <option value="{{ $kolamItem->id }}">{{ $kolamItem->nama_kolam }} ({{ $kolamItem->jumlah_ikan }})</option>
                    @endforeach
                </select>
            </div>
            @error('kolam_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Jumlah Pakan (kuintal)</label>
                <select name="pakan_id" id="pakan_id" class="form-control">
                    @foreach($pakan as $pakanItem)
                    <option value="{{ $pakanItem->id }}" data-amount="{{ $pakanItem->jumlah_pakan }}">{{ $pakanItem->jumlah_pakan }} kuintal</option>
                    @endforeach
                </select>
            </div>
            @error('pakan_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Harga Pakan per Kg</label>
                <input type="number" name="harga_pakan_per_kg" value="" class="form-control" placeholder="Masukkan Harga Pakan per Kg" required>
            </div>
            @error('harga_pakan_per_kg')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Total Biaya</label>
                <input type="number" id="total_biaya" name="total_biaya" class="form-control" placeholder="Total Biaya" readonly>
            </div>
            @error('total_biaya')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Tanggal Pembelian</label>
                <input type="date" name="tanggal_pembelian" value="{{ old('tanggal_pembelian') }}" class="form-control">
            </div>
            @error('tanggal_pembelian')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/pengeluaranpakan" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pakanSelect = document.getElementById('pakan_id');
        const hargaPakanInput = document.getElementById('harga_pakan_per_kg');
        const totalBiayaInput = document.getElementById('total_biaya');

        function calculateTotalBiaya() {
            const selectedOption = pakanSelect.options[pakanSelect.selectedIndex];
            const jumlahPakan = parseFloat(selectedOption.getAttribute('data-amount'));
            const hargaPakanPerKg = parseFloat(hargaPakanInput.value);

            if (jumlahPakan && hargaPakanPerKg) {
                const totalBiaya = jumlahPakan * 100 * hargaPakanPerKg;
                totalBiayaInput.value = totalBiaya.toFixed(2);
            } else {
                totalBiayaInput.value = '';
            }
        }

        pakanSelect.addEventListener('change', calculateTotalBiaya);
        hargaPakanInput.addEventListener('input', calculateTotalBiaya);
    });
</script>
@endpush
@endsection