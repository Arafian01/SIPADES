<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\detail_pengadaan;
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
    public function create(String $id)
    {
        $aset = aset::all();
        $rekening = rekening::where('id_golongan', 'like', '1')->get(); // Assuming tanah uses rekening with kode_rekening starting with '5'
        return view('page.golongan.tanah.create')->with([
            'aset' => $aset,
            'rekening' => $rekening,
            'id' => $id, // id_pengadaan
        ]);
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
        $aset = aset::create($dataAset);

        $dataTanah = [
            'id_aset' => $aset->id,
            'kode_pemilik' => $request->input('kode_pemilik'),
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

        if ($idPengadaan > 0) {
            $details = [
                'id_pengadaan' => $idPengadaan,
                'id_aset' => $aset->id,
            ];
            detail_pengadaan::create($details);
            return redirect()->route('pengadaan.show', $idPengadaan)->with('message_create', 'Data Tanah Berhasil Ditambahkan');
        } else {
            return redirect()->route('tanah.index')->with('message_create', 'Data Tanah Berhasil Ditambahkan');
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
        $tanah = tanah::findOrFail($id);
        $aset = aset::all();
        $rekening = rekening::where('id_golongan', 'like', '1')->get();
        return view('page.golongan.tanah.edit')->with([
            'tanah' => $tanah,
            'aset' => $aset,
            'rekening' => $rekening,
            'id_pengadaan' => $id_pengadaan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $idPengadaan = $request->input('id_pengadaan');
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
            'tanggal_perolehan' => $request->input('tanggal_perolehan'),
            'keterangan' => $request->input('keterangan'),
        ];
        $aset->update($dataAset);

        $dataTanah = [
            'kode_pemilik' => $request->input('kode_pemilik'),
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

        if ($idPengadaan > 0) {
            return redirect()->route('pengadaan.show', $idPengadaan)->with('message_update', 'Data Tanah Berhasil Diupdate');
        } else {
            return redirect()->route('tanah.index')->with('message_update', 'Data Tanah Berhasil Diupdate');
        }
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
