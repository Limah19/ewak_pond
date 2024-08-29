<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pakan;
use App\Models\Kolam;
use App\Models\Ikan;
use RealRashid\SweetAlert\Facades\Alert;

class PakanController extends Controller
{
    public function index()
    {
        // Mengambil data pakan beserta relasi ikan dan kolam
        $pakan = Pakan::with('ikan', 'kolam')->get();
        return view('pakan.index', compact('pakan'));
    }

    public function create()
    {
        // Mengambil data ikan dan kolam
        $ikan = Ikan::all();
        $kolam = Kolam::all();
        return view('pakan.create', compact('ikan', 'kolam'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pakan' => 'required|string|max:255', // Validasi untuk nama_pakan
            'ikan_id' => 'required|exists:ikan,id',
            'kolam_id' => 'required|exists:kolam,id',
            'jenis_pakan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_pemberian' => 'required|date',
        ]);

        $pakan = new Pakan([
            'nama_pakan' => $request->nama_pakan, // Menyimpan nama_pakan
            'ikan_id' => $request->ikan_id,
            'kolam_id' => $request->kolam_id,
            'jenis_pakan' => $request->jenis_pakan,
            'jumlah' => $request->jumlah,
            'tanggal_pemberian' => $request->tanggal_pemberian,
        ]);

        $simpan = $pakan->save();

        if ($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/pakan');
        } else {
            Alert::error('Failed', 'Data Gagal ditambah');
            return redirect('/pakan');
        }
    }

    public function edit($id)
    {
        $pakan = Pakan::findOrFail($id);
        $ikan = Ikan::all();
        $kolam = Kolam::all();

        return view('pakan.edit', compact('pakan', 'ikan', 'kolam'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pakan' => 'required|string|max:255', // Validasi untuk nama_pakan
            'ikan_id' => 'required|exists:ikan,id',
            'kolam_id' => 'required|exists:kolam,id',
            'jenis_pakan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_pemberian' => 'required|date',
        ]);

        $pakan = Pakan::findOrFail($id);
        $pakan->update([
            'nama_pakan' => $request->nama_pakan, // Mengupdate nama_pakan
            'ikan_id' => $request->ikan_id,
            'kolam_id' => $request->kolam_id,
            'jenis_pakan' => $request->jenis_pakan,
            'jumlah' => $request->jumlah,
            'tanggal_pemberian' => $request->tanggal_pemberian,
        ]);

        if ($pakan) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/pakan');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/pakan');
        }
    }

    public function destroy($id)
    {
        $pakan = Pakan::findOrFail($id);
        $hapus = $pakan->delete();

        if ($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/pakan');
        } else {
            Alert::error('Failed', 'Data Gagal dihapus');
            return redirect('/pakan');
        }
    }
}
