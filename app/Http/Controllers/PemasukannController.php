<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukann;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukannController extends Controller
{
    public function index()
    {
        // Mengambil data pemasukan beserta relasi ikan
        $pemasukann = Pemasukann::all();
        return view('pemasukann.index', compact('pemasukann'));
    }

    public function create()
    {
        return view('pemasukann.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'nama_kolam' => 'required|string|max:255',
            'nama_ikan' => 'required|string|max:255',
            'harga_per' => 'required|numeric|min:1',
            'total_berat' => 'required|numeric|min:1',
            'total_pemasukan' => 'required|numeric|min:1',
        ]);

        $pemasukann = new Pemasukann;
        $pemasukann->tanggal_panen = $request->tanggal_panen;
        $pemasukann->nama_kolam = $request->nama_kolam;
        $pemasukann->nama_ikan = $request->nama_ikan;
        $pemasukann->harga_per = $request->harga_per;
        $pemasukann->total_berat = $request->total_berat;
        $pemasukann->total_pemasukan = $request->total_pemasukan;

        $simpan = $pemasukann->save();

        if ($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/pemasukann');
        } else {
            Alert::error('Failed', 'Data Gagal ditambah');
            return redirect('/pemasukann');
        }
    }

    public function edit($id)
    {
        $pemasukann = Pemasukann::findOrFail($id);
        return view('pemasukann.edit', compact('pemasukann'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'nama_kolam' => 'required|string|max:255',
            'nama_ikan' => 'required|string|max:255',
            'harga_per' => 'required|numeric|min:1',
            'total_berat' => 'required|numeric|min:1',
            'total_pemasukan' => 'required|numeric|min:1',
        ]);

        $pemasukann = Pemasukann::findOrFail($id);
        $pemasukann->tanggal_panen = $request->tanggal_panen;
        $pemasukann->nama_kolam = $request->nama_kolam;
        $pemasukann->nama_ikan = $request->nama_ikan;
        $pemasukann->harga_per = $request->harga_per;
        $pemasukann->total_berat = $request->total_berat;
        $pemasukann->total_pemasukan = $request->total_pemasukan;

        $ubah = $pemasukann->save();

        if ($ubah) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/pemasukann');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/pemasukann');
        }
    }

    public function destroy($id)
    {
        $pemasukann = Pemasukann::findOrFail($id);
        $hapus = $pemasukann->delete();

        if ($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/pemasukann');
        } else {
            Alert::error('Failed', 'Data Gagal dihapus');
            return redirect('/pemasukann');
        }
    }
}
