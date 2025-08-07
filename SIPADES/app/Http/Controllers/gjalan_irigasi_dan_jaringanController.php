<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\jalan_irigasi_dan_jaringan;
use App\Models\rekening;
use App\Models\tanah;
use Illuminate\Http\Request;

class gjalan_irigasi_dan_jaringanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all necessary models
        $aset = aset::all();
        $rekening = rekening::all();
        $jalan_irigasi_dan_jaringan = jalan_irigasi_dan_jaringan::all();

        // Return the view with the fetched data
        return view('page.golongan.jalan_irigasi_dan_jaringan.index', compact('aset', 'rekening', 'jalan_irigasi_dan_jaringan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new resource
        $rekening = rekening::all();
        $aset = aset::all();
        $jalan_irigasi_dan_jaringan = jalan_irigasi_dan_jaringan::all();
        $tanah = tanah::all();
        return view('page.golongan.jalan_irigasi_dan_jaringan.create', compact('rekening', 'aset', 'jalan_irigasi_dan_jaringan', 'tanah'));
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

        $dataJalanIrigasiDanJaringan = [
            'id_aset' => $id_aset,
            'kode_pemilik' => $request->input('kode_pemilik'),
            'tanggal_perolehan' => $request->input('tanggal_perolehan'),
            'kontruksi' => $request->input('kontruksi'),
            'panjang' => $request->input('panjang'),
            'lebar' => $request->input('lebar'),
            'luas' => $request->input('luas'),
            'no_dokumen' => $request->input('no_dokumen'),
            'tanggal_dokumen' => $request->input('tanggal_dokumen'),
            'id_tanah' => $request->input('id_tanah'),
            'perolehan' => $request->input('perolehan'),
            'lokasi' => $request->input('lokasi'),
        ];
        jalan_irigasi_dan_jaringan::create($dataJalanIrigasiDanJaringan);
        return back()->with('message_', 'Data Jalan, Irigasi dan Jaringan Berhasil Ditambahkan');
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
        // Fetch the specific resource by ID
        $jalan_irigasi_dan_jaringan = jalan_irigasi_dan_jaringan::findOrFail($id);
        $aset = aset::all();
        $rekening = rekening::all();
        $tanah = tanah::all();

        // Return the view for editing the resource
        return view('page.golongan.jalan_irigasi_dan_jaringan.edit', compact('jalan_irigasi_dan_jaringan', 'aset', 'rekening', 'tanah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jalan_irigasi_dan_jaringan = jalan_irigasi_dan_jaringan::findOrFail($id);
        $aset = aset::findOrFail($jalan_irigasi_dan_jaringan->id_aset);

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

        $dataJalanIrigasiDanJaringan = [
            'kode_pemilik' => $request->input('kode_pemilik'),
            'tanggal_perolehan' => $request->input('tanggal_perolehan'),
            'kontruksi' => $request->input('kontruksi'),
            'panjang' => $request->input('panjang'),
            'lebar' => $request->input('lebar'),
            'luas' => $request->input('luas'),
            'no_dokumen' => $request->input('no_dokumen'),
            'tanggal_dokumen' => $request->input('tanggal_dokumen'),
            'id_tanah' => $request->input('id_tanah'),
            'perolehan' => $request->input('perolehan'),
            'lokasi' => $request->input('lokasi'),
        ];
        $jalan_irigasi_dan_jaringan->update($dataJalanIrigasiDanJaringan);

        return redirect()->route('jalan_irigasi_dan_jaringan.index')->with('message', 'Data Jalan, Irigasi dan Jaringan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jalan_irigasi_dan_jaringan = jalan_irigasi_dan_jaringan::findOrFail($id);
        $aset = aset::findOrFail($jalan_irigasi_dan_jaringan->id_aset);

        // Delete the jalan_irigasi_dan_jaringan and its associated aset
        $jalan_irigasi_dan_jaringan->delete();
        $aset->delete();

        return redirect()->route('jalan_irigasi_dan_jaringan.index')->with('message', 'Data Jalan, Irigasi dan Jaringan Berhasil Dihapus');
    }
}
