<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\kontruksi_dalam_pengerjaan;
use App\Models\rekening;
use Illuminate\Http\Request;

class gkontruksi_dalam_pengerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all necessary models
        $kontruksi_dalam_pengerjaan = kontruksi_dalam_pengerjaan::all();
        $aset = aset::all();
        $rekening = rekening::all();

        // Return the view with the fetched data
        return view('page.golongan.kontruksi_dalam_pengerjaan.index', compact('kontruksi_dalam_pengerjaan', 'aset', 'rekening'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new resource
        $aset = aset::all();
        $rekening = rekening::all();
        return view('page.golongan.kontruksi_dalam_pengerjaan.create', compact('aset', 'rekening'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataAset = [
            'id_barang' => $request->input('id_barang'),
            'nomor_register' => $request->input('no_reg'),
            'id_rekening' => $request->input('id_rekening'),
            'nama_label' => $request->input('nama_label'),
            'kode_belanja_bidang' => $request->input('kode_belanja_bidang'),
            'asal' => $request->input('asal'),
            'sumber_dana' => $request->input('sumber_dana'),
            'nilai_perolehan' => $request->input('nilai_perolehan'),
            'kondisi' => $request->input('kondisi'),
            'tanggal_pembukuan' => $request->input('tanggal_pembukuan'),
            'keterangan' => $request->input('keterangan'),
        ];
        aset::create($dataAset);
        $id_aset = aset::latest()->first()->id;

        $dataKontruksi = [
            'id_aset' => $id_aset,
            'nomor_dokumen' => $request->input('nomor_dokumen'),
            'tanggal_dokumen' => $request->input('tanggal_dokumen'),
        ];
        kontruksi_dalam_pengerjaan::create($dataKontruksi);

        return redirect()->route('kontruksi_dalam_pengerjaan.index')->with('success', 'Data berhasil disimpan.');
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
        // Fetch the specific kontruksi_dalam_pengerjaan by ID
        $kontruksi = kontruksi_dalam_pengerjaan::findOrFail($id);
        $aset = aset::all();
        $rekening = rekening::all();

        // Return the view for editing the resource
        return view('page.golongan.kontruksi_dalam_pengerjaan.edit', compact('kontruksi', 'aset', 'rekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kontruksi = kontruksi_dalam_pengerjaan::findOrFail($id);
        $dataAset = [
            'id_barang' => $request->input('id_barang'),
            'nomor_register' => $request->input('no_reg'),
            'id_rekening' => $request->input('id_rekening'),   
            'nama_label' => $request->input('nama_label'),
            'kode_belanja_bidang' => $request->input('kode_belanja_bidang'),
            'asal' => $request->input('asal'),
            'sumber_dana' => $request->input('sumber_dana'),
            'nilai_perolehan' => $request->input('nilai_perolehan'),
            'kondisi' => $request->input('kondisi'),
            'tanggal_pembukuan' => $request->input('tanggal_pembukuan'),
            'keterangan' => $request->input('keterangan'),
        ];
        $aset = aset::findOrFail($kontruksi->id_aset);
        $aset->update($dataAset);
        $dataKontruksi = [
            'nomor_dokumen' => $request->input('nomor_dokumen'),
            'tanggal_dokumen' => $request->input('tanggal_dokumen'),
        ];
        $kontruksi->update($dataKontruksi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the kontruksi_dalam_pengerjaan by ID
        $kontruksi = kontruksi_dalam_pengerjaan::findOrFail($id);
        
        // Delete the associated aset
        $aset = aset::findOrFail($kontruksi->id_aset);
        $aset->delete();

        // Delete the kontruksi_dalam_pengerjaan
        $kontruksi->delete();

        return redirect()->route('kontruksi_dalam_pengerjaan.index')->with('success', 'Data berhasil dihapus.');
    }
}
