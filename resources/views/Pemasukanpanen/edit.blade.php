@extends('layout.master')

@section('judul')
Edit Pemasukan Panen
@endsection

@section('content')
<div class="card" style="background-color: #99cdd8">
    <div class="card-header">
        <h3>Form Edit Pemasukan Panen</h3>
    </div>
    <div class="card-body">
        <form action="/pemasukanpanen/{{ $pemasukanPanen->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Tanggal Panen</label>
                <input type="date" name="tanggal_panen" value="{{ old('tanggal_panen', $pemasukanPanen->tanggal_panen) }}" class="form-control" required>
            </div>
            @error('tanggal_panen')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Nama Kolam</label>
                <select name="kolam_id" class="form-control">
                    @foreach($kolam as $kolamItem)
                    <option value="{{ $kolamItem->id }}" {{ $kolamItem->id == $pemasukanPanen->kolam_id ? 'selected' : '' }}>
                        {{ $kolamItem->nama_kolam }}
                    </option>
                    @endforeach
                </select>
            </div>
            @error('kolam_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Hasil Panen (ton)</label>
                <select name="panen_id" class="form-control">
                    @foreach($panen as $panenItem)
                    <option value="{{ $panenItem->id }}" {{ $panenItem->id == $pemasukanPanen->panen_id ? 'selected' : '' }}>
                        {{ $panenItem->total_berat }} ton
                    </option>
                    @endforeach
                </select>
            </div>
            @error('panen_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Harga per Kg</label>
                <input type="number" name="harga_per_kg" value="{{ old('harga_per_kg', $pemasukanPanen->harga_per_kg) }}" class="form-control" placeholder="Masukkan Harga per Kg" required>
            </div>
            @error('harga_per_kg')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Total Pemasukan Kotor</label>
                <input type="number" id="pemasukan_kotor" name="pemasukan_kotor" value="{{ old('pemasukan_kotor', $pemasukanPanen->pemasukan_kotor) }}" class="form-control" placeholder="Total Pemasukan Kotor" readonly>
            </div>
            @error('pemasukan_kotor')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Biaya Bibit</label>
                <select id="pengeluaran_bibit_id" name="pengeluaran_bibit_id" class="form-control">
                    @foreach($pengeluaranBibit as $bibit)
                    <option value="{{ $bibit->id }}" {{ $bibit->id == $pemasukanPanen->pengeluaran_bibit_id ? 'selected' : '' }}>
                        {{ $bibit->total_biaya }}
                    </option>
                    @endforeach
                </select>
            </div>
            @error('pengeluaran_bibit_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Biaya Pakan</label>
                <select name="pengeluaran_pakan_id" class="form-control">
                    @foreach($pengeluaranPakan as $pakan)
                    <option value="{{ $pakan->id }}" {{ $pakan->id == $pemasukanPanen->pengeluaran_pakan_id ? 'selected' : '' }}>
                        {{ $pakan->total_biaya }}
                    </option>
                    @endforeach
                </select>
            </div>
            @error('pengeluaran_pakan_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Pengeluaran Lainnya</label>
                <input type="number" name="pengeluaran_lainnya" value="{{ old('pengeluaran_lainnya', $pemasukanPanen->pengeluaran_lainnya) }}" class="form-control" placeholder="Pengeluaran Lainnya">
            </div>
            @error('pengeluaran_lainnya')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Pemasukan Bersih</label>
                <input type="number" id="pemasukan_bersih" name="pemasukan_bersih" value="{{ old('pemasukan_bersih', $pemasukanPanen->pemasukan_bersih) }}" class="form-control" placeholder="Pemasukan Bersih" readonly>
            </div>
            @error('pemasukan_bersih')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/pemasukanpanen" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hargaPerKgInput = document.getElementsByName('harga_per_kg')[0];
        const pemasukanKotorInput = document.getElementById('pemasukan_kotor');
        const pemasukanBersihInput = document.getElementById('pemasukan_bersih');

        function calculatePemasukan() {
            const hargaPerKg = parseFloat(hargaPerKgInput.value);
            // Mengambil total berat dari select dengan format ton, lalu mengalikannya dengan 1000 untuk mengubah ke kg
            const totalBeratTon = parseFloat(document.querySelector('select[name="panen_id"] option:checked').textContent.replace(' ton', ''));
            const totalBeratKg = totalBeratTon * 1000;

            if (!isNaN(hargaPerKg) && !isNaN(totalBeratKg)) {
                const pemasukanKotor = hargaPerKg * totalBeratKg;
                pemasukanKotorInput.value = pemasukanKotor.toFixed(2);

                const pengeluaranBibitId = parseFloat(document.querySelector('select[name="pengeluaran_bibit_id"] option:checked').textContent) || 0;
                const pengeluaranPakanId = parseFloat(document.querySelector('select[name="pengeluaran_pakan_id"] option:checked').textContent) || 0;
                const pengeluaranLainnya = parseFloat(document.getElementsByName('pengeluaran_lainnya')[0].value) || 0;

                const pemasukanBersih = pemasukanKotor - (pengeluaranBibitId + pengeluaranPakanId + pengeluaranLainnya);
                pemasukanBersihInput.value = pemasukanBersih.toFixed(2);
            } else {
                pemasukanKotorInput.value = '';
                pemasukanBersihInput.value = '';
            }
        }

        hargaPerKgInput.addEventListener('input', calculatePemasukan);
        document.querySelector('select[name="panen_id"]').addEventListener('change', calculatePemasukan);
        document.querySelector('select[name="pengeluaran_bibit_id"]').addEventListener('change', calculatePemasukan);
        document.querySelector('select[name="pengeluaran_pakan_id"]').addEventListener('change', calculatePemasukan);
        document.getElementsByName('pengeluaran_lainnya')[0].addEventListener('input', calculatePemasukan);

        // Initialize the calculation on page load
        calculatePemasukan();
    });
</script>
@endpush
@endsection
