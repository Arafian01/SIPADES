<?php

namespace App\Http\Controllers;

use App\Models\pengadaan;
use App\Models\pengguna;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengadaan = Pengadaan::all();
        $pengguna = pengguna::all();
        return view('page.pengadaan.index')->with([
            'pengadaan' => $pengadaan,
            'pengguna' => $pengguna,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama_pengadaan' => $request->input('nama_pengadaan'),
            'tanggal_pengadaan' => $request->input('tanggal_pengadaan'),
            'jumlah' => $request->input('jumlah'),
            'keterangan' => $request->input('keterangan'),
        ];
        pengadaan::create($data);
        return back()->with('message_delete', 'Data Pengadaan Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama_pengadaan' => $request->input('nama_pengadaan'),
            'tanggal_pengadaan' => $request->input('tanggal_pengadaan'),
            'jumlah' => $request->input('jumlah'),
            'keterangan' => $request->input('keterangan'),
        ];
        pengadaan::where('id', $id)->update($data);
        return back()->with('message_delete', 'Data Pengadaan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengadaan = pengadaan::findOrFail($id);
        $pengadaan->delete();
        return back()->with('message_delete', 'Data Pengadaan Berhasil Dihapus');
    }
}
