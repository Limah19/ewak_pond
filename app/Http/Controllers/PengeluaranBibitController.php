<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengeluaranBibit;
use App\Models\Kolam;
use App\Models\Ikan;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranBibitController extends Controller
{
    public function index()
    {
        $pengeluaranbibit = PengeluaranBibit::all();
        return view('pengeluaranbibit.index', compact('pengeluaranbibit'));
    }

    public function cetak()
    {
        $pengeluaranbibit = PengeluaranBibit::all();
        return view('pengeluaranbibit.cetak', compact('pengeluaranbibit'));
    }

    public function create()
    {
        $kolam = Kolam::all();
        $ikan = Ikan::all();
        return view('pengeluaranbibit.create', compact('kolam', 'ikan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'kolam_id' => 'required|exists:kolam,id',
            'ikan_id' => 'required|exists:ikan,id',
            'harga_bibit_per_ekor' => 'required|numeric',
        ]);

        $ikan = Ikan::findOrFail($request->ikan_id);
        $jumlah = $ikan->jumlah ; 

        $total_biaya = $jumlah * $request->harga_bibit_per_ekor;

        $pengeluaranbibit = new PengeluaranBibit([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'kolam_id' => $request->kolam_id,
            'ikan_id' => $request->ikan_id,
            'harga_bibit_per_ekor' => $request->harga_bibit_per_ekor,
            'total_biaya' => $total_biaya,
        ]);

        $simpan = $pengeluaranbibit->save();

        if ($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/pengeluaranbibit');
        } else {
            Alert::error('Failed', 'Data Gagal ditambah');
            return redirect('/pengeluaranbibit');
        }
    }

    public function edit($id)
    {
        $pengeluaranbibit = PengeluaranBibit::findOrFail($id);
        $kolam = Kolam::all();
        $ikan = Ikan::all();
        return view('pengeluaranbibit.edit', compact('pengeluaranbibit', 'kolam', 'ikan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'kolam_id' => 'required|exists:kolam,id',
            'ikan_id' => 'required|exists:ikan,id',
            'harga_bibit_per_ekor' => 'required|numeric',
        ]);

        $ikan = Ikan::findOrFail($request->ikan_id);
        $jumlah = $ikan->jumlah; 

        $total_biaya = $jumlah * $request->harga_bibit_per_ekor;

        $pengeluaranbibit = PengeluaranBibit::findOrFail($id);
        $pengeluaranbibit->update([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'kolam_id' => $request->kolam_id,
            'ikan_id' => $request->ikan_id,
            'harga_bibit_per_ekor' => $request->harga_bibit_per_ekor,
            'total_biaya' => $total_biaya,
        ]);

        if ($pengeluaranbibit) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/pengeluaranbibit');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/pengeluaranbibit');
        }
    }

    public function destroy($id)
    {
        $pengeluaranbibit = PengeluaranBibit::findOrFail($id);
        $hapus = $pengeluaranbibit->delete();

        if ($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/pengeluaranbibit');
        } else {
            Alert::error('Failed', 'Data Gagal dihapus');
            return redirect('/pengeluaranbibit');
        }
    }
}
