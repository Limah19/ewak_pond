<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kolam;
use RealRashid\SweetAlert\Facades\Alert;

class KolamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kolam = Kolam::all();
        return view('kolam.index', compact('kolam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kolam.create');
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
            'nama_kolam' => 'required|string|max:100',
            'ukuran_kolam' => 'required|numeric',
            'nama_ikan' => 'required|string',
            'jumlah_ikan' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $kolam = new Kolam([
            'nama_kolam' => $request->nama_kolam,
            'ukuran_kolam' => $request->ukuran_kolam,
            'nama_ikan' => $request->nama_ikan,
            'jumlah_ikan' => $request->jumlah_ikan,
            'status' => $request->status,
        ]);

        $simpan = $kolam->save();

        if ($simpan) {
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/kolam');
        } else {
            Alert::error('Failed', 'Data Gagal ditambah');
            return redirect('/kolam');
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
        $kolam = Kolam::findOrFail($id);
        return view('kolam.edit', compact('kolam'));
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
            'nama_kolam' => 'required|string|max:100',
            'ukuran_kolam' => 'required|numeric',
            'nama_ikan' => 'required|string',
            'jumlah_ikan' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $kolam = Kolam::findOrFail($id);
        $kolam->update([
            'nama_kolam' => $request->nama_kolam,
            'ukuran_kolam' => $request->ukuran_kolam,
            'nama_ikan' => $request->nama_ikan,
            'jumlah_ikan' => $request->jumlah_ikan,
            'status' => $request->status,
        ]);

        if ($kolam) {
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/kolam');
        } else {
            Alert::error('Failed', 'Data Gagal diubah');
            return redirect('/kolam');
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
        $kolam = Kolam::findOrFail($id);
        $hapus = $kolam->delete();

        if ($hapus) {
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/kolam');
        } else {
            Alert::error('Failed', 'Data Gagal dihapus');
            return redirect('/kolam');
        }
    }
}
