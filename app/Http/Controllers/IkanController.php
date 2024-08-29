<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ikan;
use App\Models\Kolam;
use RealRashid\SweetAlert\Facades\Alert;

class IkanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ikan = Ikan::all();
        return view('ikan.index', compact('ikan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kolam = Kolam::all();
        return view('ikan.create', compact('kolam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ikan' => 'required|string|max:255',
            'jenis_ikan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'berat_rata_rata' => 'required|numeric',
            'kolam_id' => 'required|exists:kolam,id',
        ]);

        $ikan = new Ikan([
            'nama_ikan' => $request->nama_ikan,
            'jenis_ikan' => $request->jenis_ikan,
            'jumlah' => $request->jumlah,
            'berat_rata_rata' => $request->berat_rata_rata,
            'kolam_id' => $request->kolam_id,
        ]);

        $simpan = $ikan->save();

        if ($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/ikan');
        } else {
            Alert::error('Failed', 'Data Gagal ditambah');
            return redirect('/ikan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ikan = Ikan::findOrFail($id);
        $kolam = Kolam::all();
        return view('ikan.edit', compact('ikan', 'kolam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ikan' => 'required|string|max:255',
            'jenis_ikan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'berat_rata_rata' => 'required|numeric',
            'kolam_id' => 'required|exists:kolam,id',
        ]);

        $ikan = Ikan::findOrFail($id);
        $ikan->update([
            'nama_ikan' => $request->nama_ikan,
            'jenis_ikan' => $request->jenis_ikan,
            'jumlah' => $request->jumlah,
            'berat_rata_rata' => $request->berat_rata_rata,
            'kolam_id' => $request->kolam_id,
        ]);

        if ($ikan) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/ikan');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/ikan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ikan = Ikan::findOrFail($id);
        $hapus = $ikan->delete();

        if ($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/ikan');
        } else {
            Alert::error('Failed', 'Data Gagal dihapus');
            return redirect('/ikan');
        }
    }
}
