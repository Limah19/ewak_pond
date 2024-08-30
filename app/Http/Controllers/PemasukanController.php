<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
{
    public function index()
    {
        
        $pemasukan = Pemasukan::all();
        return view('pemasukan.index', compact('pemasukan'));
        
    }

    public function create()
    {
        return view('pemasukan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'nama_ikannya' => 'required|string|max:255',
            'harga_per' => 'required|numeric|min:1',
            'total_berat' => 'required|numeric|min:1',
            'pemasukan_kotor' => 'required|numeric|min:1',
            'total_biaya' => 'required|numeric|min:0',
            'pemasukan_bersih' => 'required|numeric|min:0',
        ]);

        $pemasukan = new Pemasukan;
        $pemasukan->tanggal_panen = $request->tanggal_panen;
        $pemasukan->nama_ikannya = $request->nama_ikannya;
        $pemasukan->harga_per = $request->harga_per;
        $pemasukan->total_berat = $request->total_berat;
        $pemasukan->pemasukan_kotor = $request->pemasukan_kotor;
        $pemasukan->total_biaya = $request->total_biaya;
        $pemasukan->pemasukan_bersih = $request->pemasukan_bersih;

        $simpan = $pemasukan->save();

        if ($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/pemasukan');
        } else {
            Alert::error('Failed', 'Data Gagal ditambah');
            return redirect('/pemasukan');
        }
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        return view('pemasukan.edit', compact('pemasukan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_panen' => 'required|date',
            'nama_ikannya' => 'required|string|max:255',
            'harga_per' => 'required|numeric|min:1',
            'total_berat' => 'required|numeric|min:1',
            'pemasukan_kotor' => 'required|numeric|min:1',
            'total_biaya' => 'required|numeric|min:0',
            'pemasukan_bersih' => 'required|numeric|min:0',
        ]);

        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->tanggal_panen = $request->tanggal_panen;
        $pemasukan->nama_ikannya = $request->nama_ikannya;
        $pemasukan->harga_per = $request->harga_per;
        $pemasukan->total_berat = $request->total_berat;
        $pemasukan->pemasukan_kotor = $request->pemasukan_kotor;
        $pemasukan->total_biaya = $request->total_biaya;
        $pemasukan->pemasukan_bersih = $request->pemasukan_bersih;

        $ubah = $pemasukan->save();

        if ($ubah) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/pemasukan');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/pemasukan');
        }
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $hapus = $pemasukan->delete();

        if ($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/pemasukan');
        } else {
            Alert::error('Failed', 'Data Gagal dihapus');
            return redirect('/pemasukan');
        }
    }
}
