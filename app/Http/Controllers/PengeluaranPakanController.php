<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengeluaranPakan;
use App\Models\Kolam;
use App\Models\Pakan;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranPakanController extends Controller
{
    public function index()
    {
        $pengeluaranpakan = PengeluaranPakan::all();
        return view('pengeluaranpakan.index', compact('pengeluaranpakan'));
    }

    public function cetak()
    {
        $pengeluaranpakan = PengeluaranPakan::all();
        return view('pengeluaranpakan.cetak', compact('pengeluaranpakan'));
    }
    public function cetakForm(){
        return view('Pengeluaranpakan.Cetak-pegawaiiiii-form');
    }

    public function cetakPertanggal($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakPertanggal = PengeluaranPakan::all()->whereBetween('tanggal_pembelian',[$tglawal, $tglakhir]);
        return view('Pengeluaranpakan.Cetak-pengeluaran-pakan-pertanggal', compact('cetakPertanggal'));
    }
   

    public function create()
    {
        $kolam = Kolam::all();
        $pakan = Pakan::all();
        return view('pengeluaranpakan.create', compact('kolam', 'pakan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'kolam_id' => 'required|exists:kolam,id',
            'pakan_id' => 'required|exists:pakan,id',
            'harga_pakan_per_kg' => 'required|numeric',
        ]);

        $pakan = Pakan::findOrFail($request->pakan_id);
        $jumlah_pakan = $pakan->jumlah_pakan * 100; // Konversi kuintal ke kg

        $total_biaya = $jumlah_pakan * $request->harga_pakan_per_kg;

        $pengeluaranpakan = new PengeluaranPakan([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'kolam_id' => $request->kolam_id,
            'pakan_id' => $request->pakan_id,
            'harga_pakan_per_kg' => $request->harga_pakan_per_kg,
            'total_biaya' =>  $total_biaya,
        ]);

        $simpan = $pengeluaranpakan->save();

        if ($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/pengeluaranpakan');
        } else {
            Alert::error('Failed', 'Data Gagal ditambah');
            return redirect('/pengeluaranpakan');
        }
    }

    public function edit($id)
    {
        $pengeluaranpakan = PengeluaranPakan::findOrFail($id);
        $kolam = Kolam::all();
        $pakan = Pakan::all();
        return view('pengeluaranpakan.edit', compact('pengeluaranpakan', 'kolam', 'pakan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'kolam_id' => 'required|exists:kolam,id',
            'pakan_id' => 'required|exists:pakan,id',
            'harga_pakan_per_kg' => 'required|numeric',
        ]);

        $pakan = Pakan::findOrFail($request->pakan_id);
        $jumlah_pakan = $pakan->jumlah_pakan * 100; // Konversi kuintal ke kg

        $total_biaya = $jumlah_pakan * $request->harga_pakan_per_kg;

        $pengeluaranpakan = PengeluaranPakan::findOrFail($id);
        $pengeluaranpakan->update([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'kolam_id' => $request->kolam_id,
            'pakan_id' => $request->pakan_id,
            'harga_pakan_per_kg' => $request->harga_pakan_per_kg,
            'total_biaya' =>  $total_biaya,
        ]);

        if ($pengeluaranpakan) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/pengeluaranpakan');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/pengeluaranpakan');
        }
    }

    public function destroy($id)
    {
        $pengeluaranpakan = PengeluaranPakan::findOrFail($id);
        $hapus = $pengeluaranpakan->delete();

        if ($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/pengeluaranpakan');
        } else {
            Alert::error('Failed', 'Data Gagal dihapus');
            return redirect('/pengeluaranpakan');
        }
    }
}
