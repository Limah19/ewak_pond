<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panen;
use App\Models\Ikan;
use App\Models\Kolam; // Tambahkan Kolam
use RealRashid\SweetAlert\Facades\Alert;

class PanenController extends Controller
{
    public function index()
    {
        // Mengambil data panen beserta relasi ikan dan kolam
        $panen = Panen::with('ikan', 'kolam')->get();
        return view('panen.index', compact('panen'));
    }

    public function cetak()
    {
        // Mengambil data panen beserta relasi ikan dan kolam
        $panen = Panen::with('ikan', 'kolam')->get();
        return view('panen.cetak', compact('panen'));
    }

    public function create()
    {
        $ikan = Ikan::all();
        $kolam = Kolam::all(); // Ambil data kolam
        return view('panen.create', compact('ikan', 'kolam'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'jumlah_ikan' => 'required|integer|min:1',
            'total_berat' => 'required|numeric|min:1',
            'ikan_id' => 'required|exists:ikan,id',
            'kolam_id' => 'required|exists:kolam,id', // Validasi kolam_id
        ]);

        $panen = new Panen;
        $panen->tanggal_panen = $request->tanggal_panen;
        $panen->jumlah_ikan = $request->jumlah_ikan;
        $panen->total_berat = $request->total_berat;
        $panen->ikan_id = $request->ikan_id;
        $panen->kolam_id = $request->kolam_id; // Set kolam_id

        $simpan = $panen->save();

        if ($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/panen');
        } else {
            Alert::error('Failed', 'Data Gagal ditambah');
            return redirect('/panen');
        }
    }

    public function edit($id)
    {
        $panen = Panen::findOrFail($id);
        $ikan = Ikan::all();
        $kolam = Kolam::all(); // Ambil data kolam
        return view('panen.edit', compact('panen', 'ikan', 'kolam'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'jumlah_ikan' => 'required|integer|min:1',
            'total_berat' => 'required|numeric|min:1',
            'ikan_id' => 'required|exists:ikan,id',
            'kolam_id' => 'required|exists:kolam,id', // Validasi kolam_id
        ]);

        $panen = Panen::findOrFail($id);
        $panen->tanggal_panen = $request->tanggal_panen;
        $panen->jumlah_ikan = $request->jumlah_ikan;
        $panen->total_berat = $request->total_berat;
        $panen->ikan_id = $request->ikan_id;
        $panen->kolam_id = $request->kolam_id; // Set kolam_id

        $ubah = $panen->save();

        if ($ubah) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/panen');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/panen');
        }
    }

    public function destroy($id)
    {
        $panen = Panen::findOrFail($id);
        $hapus = $panen->delete();

        if ($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/panen');
        } else {
            Alert::error('Failed', 'Data Gagal dihapus');
            return redirect('/panen');
        }
    }
}
