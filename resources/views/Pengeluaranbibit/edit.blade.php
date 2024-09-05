@extends('layout.master')

@section('judul')
Edit Pengeluaran Bibit Ikan
@endsection

@section('content')
<div class="card" style="background-color: #99cdd8">
    <div class="card-header">
        <h3>Form Edit Pengeluaran Bibit Ikan</h3>
    </div>
    <div class="card-body">
        <form action="/pengeluaranbibit/{{ $pengeluaranbibit->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Kolam</label>
                <select name="kolam_id" class="form-control">
                    @foreach($kolam as $kolamItem)
                    <option value="{{ $kolamItem->id }}" {{ $pengeluaranbibit->kolam_id == $kolamItem->id ? 'selected' : '' }}>
                        {{ $kolamItem->nama_kolam }}
                    </option>
                    @endforeach
                </select>
            </div>
            @error('kolam_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Jumlah Bibit Ikan</label>
                <select id="ikan_id" name="ikan_id" class="form-control">
                    @foreach($ikan as $ikanItem)
                    <option value="{{ $ikanItem->id }}" data-amount="{{ $ikanItem->jumlah }}" {{ $pengeluaranbibit->ikan_id == $ikanItem->id ? 'selected' : '' }}>
                        {{ $ikanItem->jumlah }} ekor ({{ $ikanItem->nama_ikan }})
                    </option>
                    @endforeach
                </select>
            </div>
            @error('ikan_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Harga Bibit per Ekor</label>
                <input type="number" name="harga_bibit_per_ekor" value="{{ $pengeluaranbibit->harga_bibit_per_ekor }}" class="form-control" placeholder="Masukkan Harga Bibit per Ekor" required>
            </div>
            @error('harga_bibit_per_ekor')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Total Biaya</label>
                <input type="number" id="total_biaya" name="total_biaya" class="form-control" value="{{ $pengeluaranbibit->total_biaya }}" readonly>
            </div>
            @error('total_biaya')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label>Tanggal Pembelian</label>
                <input type="date" name="tanggal_pembelian" value="{{ $pengeluaranbibit->tanggal_pembelian }}" class="form-control">
            </div>
            @error('tanggal_pembelian')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/pengeluaranbibit" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ikanSelect = document.getElementById('ikan_id');
        const hargaBibitInput = document.getElementById('harga_bibit_per_ekor');
        const totalBiayaInput = document.getElementById('total_biaya');

        function calculateTotalBiaya() {
            const selectedOption = ikanSelect.options[ikanSelect.selectedIndex];
            const jumlah = parseFloat(selectedOption.getAttribute('data-amount'));
            const hargaBibitPerEkor = parseFloat(hargaBibitInput.value);

            if (!isNaN(jumlah) && !isNaN(hargaBibitPerEkor)) {
                const totalBiaya = jumlah * hargaBibitPerEkor;
                totalBiayaInput.value = totalBiaya.toFixed(2);
            } else {
                totalBiayaInput.value = '';
            }
        }

        ikanSelect.addEventListener('change', calculateTotalBiaya);
        hargaBibitInput.addEventListener('input', calculateTotalBiaya);
    });
</script>
@endpush
@endsection
