<?php

// app/Http/Controllers/PengeluaranPakanController.php

namespace App\Http\Controllers;

use App\Models\PengeluaranPakan;
use App\Models\Kolam;
use App\Models\Pakan;
use Illuminate\Http\Request;

class PengeluaranPakanController extends Controller
{
    public function index()
    {
        // Menampilkan form pengeluaran pakan
        $kolam = Kolam::all(); // Mengambil semua data kolam
        $pakan = Pakan::all(); // Mengambil semua data pakan
        return view('pengeluaran-pakan.index', compact('kolam', 'pakan'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'kolam_id' => 'required|exists:kolam,id',
            'pakan_id' => 'required|exists:pakan,id',
            'harga_pakan_per_kg' => 'required|numeric',

        ]);

        // Ambil data pakan
        $pakan = Pakan::findOrFail($request->input('pakan_id'));

        // Hitung total biaya
        $jumlah_pakan = $pakan->jumlah_pakan; // Ambil jumlah pakan dari data pakan
        $harga_pakan_per_kg = $request->input('harga_pakan_per_kg');
        $total_biaya = $jumlah_pakan * $harga_pakan_per_kg;

        // Simpan data pengeluaran pakan
        PengeluaranPakan::create([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'kolam_id' => $request->input('kolam_id'),
            'pakan_id' => $pakan->id,
            'harga_pakan_per_kg' => $harga_pakan_per_kg,
            'total_biaya' => $total_biaya,
        ]);

        return redirect()->route('pengeluaran-pakan.index')->with('success', 'Pengeluaran pakan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Ambil data pengeluaran pakan untuk diedit
        $pengeluaranPakan = PengeluaranPakan::findOrFail($id);
        $kolam = Kolam::all();
        $pakan = Pakan::all();
        return view('pengeluaran-pakan.edit', compact('pengeluaranPakan', 'kolam', 'pakan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'kolam_id' => 'required|exists:kolam,id',
            'pakan_id' => 'required|exists:pakan,id',
            'harga_pakan_per_kg' => 'required|numeric',
        ]);

        // Ambil data pengeluaran pakan
        $pengeluaranPakan = PengeluaranPakan::findOrFail($id);

        // Ambil data pakan
        $pakan = Pakan::findOrFail($request->input('pakan_id'));

        // Hitung total biaya
        $jumlah_pakan = $pakan->jumlah_pakan; // Ambil jumlah pakan dari data pakan
        $harga_pakan_per_kg = $request->input('harga_pakan_per_kg');
        $total_biaya = $jumlah_pakan * $harga_pakan_per_kg;

        // Update data pengeluaran pakan
        $pengeluaranPakan->update([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'kolam_id' => $request->input('kolam_id'),
            'pakan_id' => $pakan->id,
            'harga_pakan_per_kg' => $harga_pakan_per_kg,
            'total_biaya' => $total_biaya,
        ]);

        return redirect()->route('pengeluaran-pakan.index')->with('success', 'Pengeluaran pakan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data pengeluaran pakan
        $pengeluaranPakan = PengeluaranPakan::findOrFail($id);
        $pengeluaranPakan->delete();

        return redirect()->route('pengeluaran-pakan.index')->with('success', 'Pengeluaran pakan berhasil dihapus.');
    }
}

