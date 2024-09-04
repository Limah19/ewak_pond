@extends('layout.master')

@section('judul')
Tambah Data Pakan
@endsection

@section('content')
<div class="card" style="background-color: #99cdd8">
    <div class="card-header">
        <h3>Form Tambah Data Pakan</h3>
    </div>
    <div class="card-body">
        <form method="post" action="/pakan">
            @csrf
            <div class="form-group">
                <label>Nama Pakan</label>
                <input type="text" name="nama_pakan" value="{{ old('nama_pakan') }}" class="form-control" placeholder="Masukkan Nama Pakan" required>
            </div>
            @error('nama_pakan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

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
                <select name="ikan_id" class="form-control" id="ikan_id">
                    @foreach($ikan as $ikanItem)
                    <option value="{{ $ikanItem->id }}">{{ $ikanItem->nama_ikan }}</option>
                    @endforeach
                </select>
            </div>
            @error('ikan_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Jumlah Pakan (kuintal)</label>
                <input type="number" name="jumlah_pakan" id="jumlah_pakan" value="{{ old('jumlah_pakan') }}" class="form-control" placeholder="Masukkan Jumlah Pakan (ton)" required>
            </div>
            @error('jumlah_pakan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Jenis Pakan</label>
                <input type="text" name="jenis_pakan" value="{{ old('jenis_pakan') }}" class="form-control" placeholder="Masukkan Jenis Pakan" required>
            </div>
            @error('jenis_pakan')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Tanggal Pemberian</label>
                <input type="date" name="tanggal_pemberian" value="{{ old('tanggal_pemberian') }}" class="form-control">
            </div>
            @error('tanggal_pemberian')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Simpan</button>
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