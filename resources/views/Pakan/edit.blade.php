@extends('layout.master')

@section('judul')
Edit Data Pakan
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Form Edit Data Pakan
    </div>
    <div class="card-body">
        <form method="post" action="/pakan/{{ $pakan->id }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Pakan</label>
                <input type="text" name="nama_pakan" value="{{ old('nama_pakan', $pakan->nama_pakan) }}" class="form-control">
            </div>
            @error('nama_pakan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Nama Kolam</label>
                <select name="kolam_id" class="form-control">
                    @foreach($kolam as $kolamItem)
                    <option value="{{ $kolamItem->id }}" {{ $pakan->kolam_id == $kolamItem->id ? 'selected' : '' }}>
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
                <select name="ikan_id" class="form-control" id="ikan_id">
                    @foreach($ikan as $ikanItem)
                    <option value="{{ $ikanItem->id }}">{{ $ikanItem->nama_ikan }}</option>
                    @endforeach
                </select>
            </div>
            @error('ikan_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Hapus bagian berikut -->
            <!--
    <div class="form-group">
        <label>Berat Ikan per Ekor (gram)</label>
        <input type="number" name="berat_ikan" id="berat_ikan" value="{{ old('berat_ikan', $pakan->berat_ikan) }}" class="form-control">
    </div>
    @error('berat_ikan')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    -->

            <div class="form-group">
                <label>Jumlah Pakan (kg)</label>
                <input type="number" name="jumlah" id="jumlah_pakan" value="{{ old('jumlah', $pakan->jumlah) }}" class="form-control">
            </div>
            @error('jumlah')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Jenis Pakan</label>
                <input type="text" name="jenis_pakan" value="{{ old('jenis_pakan', $pakan->jenis_pakan) }}" class="form-control">
            </div>
            @error('jenis_pakan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Tanggal Pemberian</label>
                <input type="date" name="tanggal_pemberian" value="{{ old('tanggal_pemberian', $pakan->tanggal_pemberian) }}" class="form-control">
            </div>
            @error('tanggal_pemberian')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/pakan" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ikanSelect = document.getElementById('ikan_id');
        const jumlahPakanInput = document.getElementById('jumlah_pakan');
        let manualInput = false; // Flag to indicate if user has manually input value

        function calculatePakan() {
            if (!manualInput) { // Only calculate if user hasn't manually inputted value
                const selectedOption = ikanSelect.options[ikanSelect.selectedIndex];
                const jumlahIkan = parseInt(selectedOption.getAttribute('data-jumlah'));

                if (jumlahIkan) {
                    // Tentukan perhitungan pakan berdasarkan jumlah ikan
                    const jumlahPakanHarianKg = jumlahIkan * 0.04; // 4% dari jumlah ikan
                    const jumlahPakanMingguanKg = jumlahPakanHarianKg * 7; // Jumlah pakan per minggu

                    jumlahPakanInput.value = Math.round(jumlahPakanMingguanKg); // Bulatkan tanpa desimal
                } else {
                    jumlahPakanInput.value = '0';
                }
            }
        }

        ikanSelect.addEventListener('change', function() {
            manualInput = false; // Reset manual input flag on change
            calculatePakan();
        });
        jumlahPakanInput.addEventListener('input', function() {
            manualInput = true; // Set flag to true when user inputs value manually
        });

        // Kalkulasi awal jika ada opsi yang sudah terpilih
        calculatePakan();
    });
</script>
@endpush
@endsection