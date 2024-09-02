<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluarann; // Pastikan model sudah sesuai
use RealRashid\SweetAlert\Facades\Alert;

class PengeluarannController extends Controller
{
    public function index()
    {
        // Mengambil semua data pengeluarann pakan ikan
        $pengeluarann = Pengeluarann::all();
        return view('pengeluarann.index', compact('pengeluarann'));
    }

    public function create()
    {
        return view('pengeluarann.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'jenis_pakan' => 'required|string|max:255',
            'jumlah_pakan' => 'required|numeric|min:1',
            'harga_per' => 'required|numeric|min:1',
            'total_biaya' => 'required|numeric|min:0',
        ]);

        $pengeluarann = new Pengeluarann;
        $pengeluarann->tanggal_pembelian = $request->tanggal_pembelian;
        $pengeluarann->jenis_pakan = $request->jenis_pakan;
        $pengeluarann->jumlah_pakan = $request->jumlah_pakan;
        $pengeluarann->harga_per = $request->harga_per;
        $pengeluarann->total_biaya = $request->total_biaya;

        $simpan = $pengeluarann->save();

        if ($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/pengeluarann');
        } else {
            Alert::error('Failed', 'Data Gagal ditambah');
            return redirect('/pengeluarann');
        }
    }

    public function edit($id)
    {
        $pengeluarann = Pengeluarann::findOrFail($id);
        return view('pengeluarann.edit', compact('pengeluarann'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'jenis_pakan' => 'required|string|max:255',
            'jumlah_pakan' => 'required|numeric|min:1',
            'harga_per' => 'required|numeric|min:1',
            'total_biaya' => 'required|numeric|min:0',
        ]);

        $pengeluarann = Pengeluarann::findOrFail($id);
        $pengeluarann->tanggal_pembelian = $request->tanggal_pembelian;
        $pengeluarann->jenis_pakan = $request->jenis_pakan;
        $pengeluarann->jumlah_pakan = $request->jumlah_pakan;
        $pengeluarann->harga_per = $request->harga_per;
        $pengeluarann->total_biaya = $request->total_biaya;

        $ubah = $pengeluarann->save();

        if ($ubah) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/pengeluarann');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/pengeluarann');
        }
    }

    public function destroy($id)
    {
        $pengeluarann = Pengeluarann::findOrFail($id);
        $hapus = $pengeluarann->delete();

        if ($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/pengeluarann');
        } else {
            Alert::error('Failed', 'Data Gagal dihapus');
            return redirect('/pengeluarann');
        }
    }
}
