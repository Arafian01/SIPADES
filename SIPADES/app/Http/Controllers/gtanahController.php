<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\rekening;
use App\Models\tanah;
use Illuminate\Http\Request;

class gtanahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanah = tanah::all();
        $aset = aset::all();
        $rekening = rekening::all();
        return view('page.golongan.tanah.index')->with([
            'tanah' => $tanah,
            'aset' => $aset,
            'rekening' => $rekening,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aset = aset::all();
        $rekening = rekening::all();
        return view('page.golongan.tanah.create')->with([
            'aset' => $aset,
            'rekening' => $rekening,
        ]);
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
        
        $dataTanah = [
            'id_aset' => $id_aset,
            'kode_pemilik' => $request->input('kode_pemilik'),
            'tanggal_perolehan' => $request->input('tanggal_perolehan'),
            'luas' => $request->input('luas'),
            'status' => $request->input('status'),
            'tanggal_sertifikat' => $request->input('tanggal_sertifikat'),
            'nomor_sertifikat' => $request->input('no_sertifikat'),
            'perolehan' => $request->input('perolehan'),
            'alamat' => $request->input('alamat'),
            'kode_lokasi' => $request->input('kode_lokasi'),
            'lokasi_desa' => $request->input('kode_lokasi'),
            'batas_utara' => $request->input('batas_utara'),
            'batas_timur' => $request->input('batas_timur'),
            'batas_selatan' => $request->input('batas_selatan'),
            'batas_barat' => $request->input('batas_barat'),
            'keterangan' => $request->input('keterangan'),
        ];
        tanah::create($dataTanah);
        return back()->with('message_delete', 'Data Tanah Berhasil Ditambahkan');
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
        $tanah = tanah::findOrFail($id);
        $aset = aset::all();
        $rekening = rekening::all();
        return view('page.golongan.tanah.edit')->with([
            'tanah' => $tanah,
            'aset' => $aset,
            'rekening' => $rekening,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tanah = tanah::findOrFail($id);
        $aset = aset::findOrFail($tanah->id_aset);

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
        $aset->update($dataAset);

        $dataTanah = [
            'kode_pemilik' => $request->input('kode_pemilik'),
            'tanggal_perolehan' => $request->input('tanggal_perolehan'),
            'luas' => $request->input('luas'),
            'status' => $request->input('status'),
            'tanggal_sertifikat' => $request->input('tanggal_sertifikat'),
            'nomor_sertifikat' => $request->input('no_sertifikat'),
            'perolehan' => $request->input('perolehan'),
            'alamat' => $request->input('alamat'),
            'kode_lokasi' => $request->input('kode_lokasi'),
            'lokasi_desa' => $request->input('kode_lokasi'),
            'batas_utara' => $request->input('batas_utara'),
            'batas_timur' => $request->input('batas_timur'),
            'batas_selatan' => $request->input('batas_selatan'),
            'batas_barat' => $request->input('batas_barat'),
            'keterangan' => $request->input('keterangan'),
        ];
        $tanah->update($dataTanah);
        return back()->with('message_update', 'Data Tanah Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tanah = tanah::findOrFail($id);
        $aset = aset::findOrFail($tanah->id_aset);
        $tanah->delete();
        $aset->delete();
        return back()->with('message_delete', 'Data Tanah Berhasil Dihapus');
    }
}
