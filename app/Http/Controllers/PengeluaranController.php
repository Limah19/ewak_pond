<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    public function index()
    {
        // Mengambil data pengeluaran
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index', compact('pengeluaran'));
    }

    public function create()
    {
        return view('pengeluaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'nama_ikan' => 'required|string|max:255',
            'jumlah_ikan' => 'required|integer|min:1',
            'harga_per' => 'required|numeric|min:1',
            'total_biaya' => 'required|numeric|min:0',
        ]);

        $pengeluaran = new Pengeluaran;
        $pengeluaran->tanggal_pembelian = $request->tanggal_pembelian;
        $pengeluaran->nama_ikan = $request->nama_ikan;
        $pengeluaran->jumlah_ikan = $request->jumlah_ikan;
        $pengeluaran->harga_per = $request->harga_per;
        $pengeluaran->total_biaya = $request->total_biaya;

        $simpan = $pengeluaran->save();

        if ($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/pengeluaran');
        } else {
            Alert::error('Failed', 'Data Gagal ditambah');
            return redirect('/pengeluaran');
        }
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'nama_ikan' => 'required|string|max:255',
            'jumlah_ikan' => 'required|integer|min:1',
            'harga_per' => 'required|numeric|min:1',
            'total_biaya' => 'required|numeric|min:0',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->tanggal_pembelian = $request->tanggal_pembelian;
        $pengeluaran->nama_ikan = $request->nama_ikan;
        $pengeluaran->jumlah_ikan = $request->jumlah_ikan;
        $pengeluaran->harga_per = $request->harga_per;
        $pengeluaran->total_biaya = $request->total_biaya;

        $ubah = $pengeluaran->save();

        if ($ubah) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/pengeluaran');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/pengeluaran');
        }
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $hapus = $pengeluaran->delete();

        if ($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/pengeluaran');
        } else {
            Alert::error('Failed', 'Data Gagal dihapus');
            return redirect('/pengeluaran');
        }
    }
}
