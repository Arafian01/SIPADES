<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\detail_pengadaan;
use App\Models\gedung_dan_bangunan;
use App\Models\rekening;
use App\Models\tanah;
use Illuminate\Http\Request;

class ggedung_dan_bangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gedung_dan_bangunan = gedung_dan_bangunan::all();
        $aset = aset::all();
        $rekening = rekening::all();
        return view('page.golongan.gedung_dan_bangunan.index', compact('gedung_dan_bangunan', 'aset', 'rekening'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        $aset = aset::all();
        $rekening = rekening::where('id_golongan', 'like', '3')->get();
        $tanah = tanah::all(); 
        return view('page.golongan.gedung_dan_bangunan.create', compact('aset', 'rekening', 'tanah', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idPengadaan = $request->input('id_pengadaan');
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

        $dataGedungDanBangunan = [
            'id_aset' => $id_aset,
            'kode_pemilik' => $request->input('kode_pemilik'),
            'tanggal_perolehan' => $request->input('tanggal_perolehan'),
            'luas_lantai' => $request->input('luas_lantai'),
            'bertingkat' => $request->input('bertingkat'),
            'beton' => $request->input('beton'),
            'no_dokumen' => $request->input('no_dokumen'),
            'tanggal_dokumen' => $request->input('tanggal_dokumen'),
            'id_tanah' => $request->input('id_tanah'),
            'perolehan' => $request->input('perolehan'),
            'alamat' => $request->input('alamat'),
        ];
        gedung_dan_bangunan::create($dataGedungDanBangunan);

        if ($idPengadaan != 0) {
            $details = [
                'id_pengadaan' => $idPengadaan,
                'id_aset' => $id_aset,
            ];
            detail_pengadaan::create($details);
            return redirect()->route('pengadaan.show', $idPengadaan)
                ->with('message_delete', 'Data Gedung dan Bangunan Berhasil Ditambahkan');
        } else {
            return redirect()->route('gedung_dan_bangunan.index')
                ->with('message_delete', 'Data Gedung dan Bangunan Berhasil Ditambahkan');
        }
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
        $gedung_dan_bangunan = gedung_dan_bangunan::findOrFail($id);
        $aset = aset::all();
        $rekening = rekening::where('id_golongan', 'like', '3')->get();
        $tanah = tanah::all();
        return view('page.golongan.gedung_dan_bangunan.edit', compact('gedung_dan_bangunan', 'aset', 'rekening', 'tanah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gedung_dan_bangunan = gedung_dan_bangunan::findOrFail($id);
        $aset = aset::findOrFail($gedung_dan_bangunan->id_aset);

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

        $dataGedungDanBangunan = [
            'kode_pemilik' => $request->input('kode_pemilik'),
            'tanggal_perolehan' => $request->input('tanggal_perolehan'),
            'luas_lantai' => $request->input('luas_lantai'),
            'bertingkat' => $request->input('bertingkat'),
            'beton' => $request->input('beton'),
            'no_dokumen' => $request->input('no_dokumen'),
            'tanggal_dokumen' => $request->input('tanggal_dokumen'),
            'id_tanah' => $request->input('id_tanah'),
            'perolehan' => $request->input('perolehan'),
            'alamat' => $request->input('alamat'),
        ];
        $gedung_dan_bangunan->update($dataGedungDanBangunan);

        return redirect()->route('gedung_dan_bangunan.index')->with('message', 'Data Gedung dan Bangunan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gedung_dan_bangunan = gedung_dan_bangunan::findOrFail($id);
        $aset = aset::findOrFail($gedung_dan_bangunan->id_aset);

        // Delete the gedung dan bangunan record
        $gedung_dan_bangunan->delete();

        // Delete the associated aset record
        $aset->delete();

        return redirect()->route('gedung_dan_bangunan.index')->with('message_delete', 'Data Gedung dan Bangunan Berhasil Dihapus');
    }
}
