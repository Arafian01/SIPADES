<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\aset_tetap_lainnya;
use App\Models\detail_pengadaan;
use App\Models\rekening;
use Illuminate\Http\Request;

class gaset_tetap_lainnyaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all necessary models
        $aset = aset::all();
        $rekening = rekening::all();
        $aset_tetap_lainnya = aset_tetap_lainnya::all();

        // Return the view with the fetched data
        return view('page.golongan.aset_tetap_lainnya.index', compact('aset', 'rekening', 'aset_tetap_lainnya'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        // Return the view for creating a new resource
        $rekening = rekening::where('id_golongan', 'like', '5')->get();
        $aset = aset::all();
        return view('page.golongan.aset_tetap_lainnya.create', compact('rekening', 'aset', 'id'));
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
            'tanggal_perolehan' => $request->input('tanggal_perolehan'),
            'keterangan' => $request->input('keterangan'),
        ];
        aset::create($dataAset);
        $id_aset = aset::latest()->first()->id;

        $dataAsetTetapLainnya = [
            'id_aset' => $id_aset,
            'kode_pemilik' => $request->input('kode_pemilik'),
            'ruang' => $request->input('ruang'),
            'judul' => $request->input('judul'),
            'pencipta' => $request->input('pencipta'),
            'ukuran' => $request->input('ukuran'),
            'bahan' => $request->input('bahan'),
            'perolehan' => $request->input('perolehan'),
        ];
        aset_tetap_lainnya::create($dataAsetTetapLainnya);

        if ($idPengadaan != 0) {
            $details = [
                'id_pengadaan' => $idPengadaan,
                'id_aset' => $id_aset,
            ];
            detail_pengadaan::create($details);
            return redirect()->route('pengadaan.show', $idPengadaan)->with('message', 'Data Aset Tetap Lainnya Berhasil Ditambahkan');
        } else {
            return redirect()->route('aset_tetap_lainnya.index')->with('message', 'Data Aset Tetap Lainnya Berhasil Ditambahkan');
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
    public function edit(string $id, String $id_pengadaan)
    {
        // Fetch the specific resource by ID
        $aset_tetap_lainnya = aset_tetap_lainnya::findOrFail($id);
        $aset = aset::all();
        $rekening = rekening::where('id_golongan', 'like', '5')->get();

        // Return the view for editing the resource
        return view('page.golongan.aset_tetap_lainnya.edit', compact('aset_tetap_lainnya', 'aset', 'rekening', 'id_pengadaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $idPengadaan = $request->input('id_pengadaan');
        $aset_tetap_lainnya = aset_tetap_lainnya::findOrFail($id);
        $aset = aset::findOrFail($aset_tetap_lainnya->id_aset);

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
            'tanggal_perolehan' => $request->input('tanggal_perolehan'),
            'keterangan' => $request->input('keterangan'),
        ];
        $aset->update($dataAset);
        $dataAsetTetapLainnya = [
            'kode_pemilik' => $request->input('kode_pemilik'),
            'ruang' => $request->input('ruang'),
            'judul' => $request->input('judul'),
            'pencipta' => $request->input('pencipta'),
            'ukuran' => $request->input('ukuran'),
            'bahan' => $request->input('bahan'),
            'perolehan' => $request->input('perolehan'),
        ];
        $aset_tetap_lainnya->update($dataAsetTetapLainnya);
        if ($idPengadaan != '0') {
            return redirect()->route('pengadaan.show', $idPengadaan)->with('success', 'Data berhasil diperbarui.');
        } else {
            return redirect()->route('aset_tetap_lainnya.index')->with('success', 'Data berhasil diperbarui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aset_tetap_lainnya = aset_tetap_lainnya::findOrFail($id);
        $aset = aset::findOrFail($aset_tetap_lainnya->id_aset);

        // Delete the aset_tetap_lainnya and its associated aset
        $aset_tetap_lainnya->delete();
        $aset->delete();

        return redirect()->route('aset_tetap_lainnya.index')->with('message', 'Data Aset Tetap Lainnya Berhasil Dihapus');
    }
}
