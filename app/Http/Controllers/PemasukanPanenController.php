<?php

namespace App\Http\Controllers;

use App\Models\PemasukanPanen;
use App\Models\Kolam;
use App\Models\Panen;
use App\Models\PengeluaranBibit;
use App\Models\PengeluaranPakan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanPanenController extends Controller
{
    public function index()
    {
        $pemasukanPanen = PemasukanPanen::all();
        return view('pemasukanpanen.index', compact('pemasukanPanen'));
    }
    public function cetak()
    {
        $pemasukanPanen = PemasukanPanen::all();
        return view('pemasukanpanen.cetak', compact('pemasukanPanen'));
    }


    public function create()
    {
        $kolam = Kolam::all();
        $panen = Panen::all();
        $pengeluaranBibit = PengeluaranBibit::all();
        $pengeluaranPakan = PengeluaranPakan::all();
        return view('pemasukanpanen.create', compact('kolam', 'panen', 'pengeluaranBibit', 'pengeluaranPakan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'kolam_id' => 'required|exists:kolam,id',
            'panen_id' => 'required|exists:panen,id',
            'harga_per_kg' => 'required|numeric',
            'pengeluaran_bibit_id' => 'required|exists:pengeluaran_bibits,id',
            'pengeluaran_pakan_id' => 'required|exists:pengeluaran_pakans,id',
            'pengeluaran_lainnya' => 'nullable|numeric',
        ]);

        $panen = Panen::findOrFail($request->panen_id);
        $totalBeratKg = $panen->total_berat * 1000;
        $pemasukanKotor = $totalBeratKg * $request->harga_per_kg;

        $pengeluaranBibit = PengeluaranBibit::findOrFail($request->pengeluaran_bibit_id);
        $pengeluaranPakan = PengeluaranPakan::findOrFail($request->pengeluaran_pakan_id);

        $pengeluaranLainnya = $request->pengeluaran_lainnya ?? 0;

        $pemasukanBersih = $pemasukanKotor - (
            $pengeluaranBibit->total_biaya +
            $pengeluaranPakan->total_biaya +
            $pengeluaranLainnya
        );

        $pemasukanPanen = new PemasukanPanen([
            'tanggal_panen' => $request->tanggal_panen,
            'kolam_id' => $request->kolam_id,
            'panen_id' => $request->panen_id,
            'harga_per_kg' => $request->harga_per_kg,
            'pemasukan_kotor' => $pemasukanKotor,
            'pemasukan_bersih' => $pemasukanBersih,
            'pengeluaran_bibit_id' => $request->pengeluaran_bibit_id,
            'pengeluaran_pakan_id' => $request->pengeluaran_pakan_id,
            'pengeluaran_lainnya' => $pengeluaranLainnya,
        ]);

        $simpan = $pemasukanPanen->save();

        if ($simpan) {
            Alert::success('Success', 'Pemasukan panen berhasil ditambahkan');
            return redirect('/pemasukanpanen');
        } else {
            Alert::error('Failed', 'Pemasukan panen gagal ditambahkan');
            return redirect('/pemasukanpanen');
        }
    }


    public function edit($id)
    {
        $pemasukanPanen = PemasukanPanen::findOrFail($id);
        $kolam = Kolam::all();
        $panen = Panen::all();
        $pengeluaranBibit = PengeluaranBibit::all();
        $pengeluaranPakan = PengeluaranPakan::all();

        return view('pemasukanpanen.edit', compact('pemasukanPanen', 'kolam', 'panen', 'pengeluaranBibit', 'pengeluaranPakan'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'kolam_id' => 'required|exists:kolam,id',
            'panen_id' => 'required|exists:panen,id',
            'harga_per_kg' => 'required|numeric',
            'pengeluaran_bibit_id' => 'nullable|exists:pengeluaran_bibits,id',
            'pengeluaran_pakan_id' => 'nullable|exists:pengeluaran_pakans,id',
            'pengeluaran_lainnya' => 'nullable|numeric',
        ]);

        $panen = Panen::findOrFail($request->panen_id);
        $totalBeratKg = $panen->total_berat * 1000;
        $pemasukanKotor = $totalBeratKg * $request->harga_per_kg;

        $pengeluaranBibit = PengeluaranBibit::find($request->pengeluaran_bibit_id);
        $pengeluaranPakan = PengeluaranPakan::find($request->pengeluaran_pakan_id);
        $pengeluaranLainnya = $request->pengeluaran_lainnya ?? 0;

        $totalBiayaBibit = $pengeluaranBibit ? $pengeluaranBibit->total_biaya : 0;
        $totalBiayaPakan = $pengeluaranPakan ? $pengeluaranPakan->total_biaya : 0;

        $pemasukanBersih = $pemasukanKotor - ($totalBiayaBibit + $totalBiayaPakan + $pengeluaranLainnya);

        $pemasukanPanen = PemasukanPanen::findOrFail($id);
        $pemasukanPanen->update([
            'tanggal_panen' => $request->tanggal_panen,
            'kolam_id' => $request->kolam_id,
            'panen_id' => $request->panen_id,
            'harga_per_kg' => $request->harga_per_kg,
            'pemasukan_kotor' => $pemasukanKotor,
            'pemasukan_bersih' => $pemasukanBersih,
            'pengeluaran_bibit_id' => $request->pengeluaran_bibit_id,
            'pengeluaran_pakan_id' => $request->pengeluaran_pakan_id,
            'pengeluaran_lainnya' => $pengeluaranLainnya,
        ]);

        if ($pemasukanPanen) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/pemasukanpanen');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/pemasukanpanen');
        }
    }

    public function destroy($id)
    {
        // Cari data PemasukanPanen berdasarkan ID
        $pemasukanPanen = PemasukanPanen::findOrFail($id);

        // Hapus data
        $hapus = $pemasukanPanen->delete();

        // Cek apakah penghapusan berhasil
        if ($hapus) {
            Alert::success('Success', 'Pemasukan panen berhasil dihapus.');
            return redirect()->route('pemasukanpanen.index');
        } else {
            Alert::error('Failed', 'Pemasukan panen gagal dihapus.');
            return redirect()->route('pemasukanpanen.index');
        }
    }
}
