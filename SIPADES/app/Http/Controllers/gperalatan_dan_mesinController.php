<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\detail_pengadaan;
use App\Models\peralatan_dan_mesin;
use App\Models\rekening;
use App\Models\ruangan;
use Illuminate\Http\Request;

class gperalatan_dan_mesinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aset = aset::all();
        $rekening = rekening::all();
        $peralatan_dan_mesin = peralatan_dan_mesin::all();
        return view('page.golongan.peralatan_dan_mesin.index', compact('aset', 'rekening', 'peralatan_dan_mesin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        $aset = aset::all();
        $rekening = rekening::where('id_golongan', 'like', '2')->get();
        $ruangan = ruangan::all();
        $peralatan_dan_mesin = peralatan_dan_mesin::all();

        return view('page.golongan.peralatan_dan_mesin.create', compact('aset', 'rekening', 'ruangan', 'id'));
        
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

        $dataPeralatanDanMesin = [
            'id_aset' => $id_aset,
            'kode_pemilik' => $request->input('kode_pemilik'),
            'ruang' => $request->input('ruang'),
            'merk' => $request->input('merk'),
            'ukuran' => $request->input('ukuran'),
            'bahan' => $request->input('bahan'),
            'nomor_pabrik' => $request->input('nomor_pabrik'),
            'nomor_rangka' => $request->input('nomor_rangka'),
            'nomor_mesin' => $request->input('nomor_mesin'),
            'nomor_polisi' => $request->input('nomor_polisi'),
            'nomor_bpkb' => $request->input('nomor_bpkb'),
            'perolehan' => $request->input('perolehan'),
        ];
        peralatan_dan_mesin::create($dataPeralatanDanMesin);

        if ($idPengadaan > 0) {
            $details = [
                'id_pengadaan' => $idPengadaan,
                'id_aset' => $id_aset,
            ];
            detail_pengadaan::create($details);
            return redirect()->route('pengadaan.show', $idPengadaan)
                ->with('message_delete', 'Data Peralatan dan Mesin Berhasil Ditambahkan');
        } else {
            return redirect()->route('peralatan_dan_mesin.index')
                ->with('message_delete', 'Data Peralatan dan Mesin Berhasil Ditambahkan');
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
        $peralatan_dan_mesin = peralatan_dan_mesin::findOrFail($id);
        $aset = aset::all();
        $rekening = rekening::where('id_golongan', 'like', '2')->get();
        $ruangan = ruangan::all();
        return view('page.golongan.peralatan_dan_mesin.edit', compact('peralatan_dan_mesin', 'aset', 'rekening', 'ruangan', 'id_pengadaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $idPengadaan = $request->input('id_pengadaan');
        $peralatan_dan_mesin = peralatan_dan_mesin::findOrFail($id);
        $aset = aset::findOrFail($peralatan_dan_mesin->id_aset);
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

        $dataPeralatanDanMesin = [
            'kode_pemilik' => $request->input('kode_pemilik'),
            'ruang' => $request->input('ruang'),
            'merk' => $request->input('merk'),
            'ukuran' => $request->input('ukuran'),
            'bahan' => $request->input('bahan'),
            'nomor_pabrik' => $request->input('nomor_pabrik'),
            'nomor_rangka' => $request->input('nomor_rangka'),
            'nomor_mesin' => $request->input('nomor_mesin'),
            'nomor_polisi' => $request->input('nomor_polisi'),
            'nomor_bpkb' => $request->input('nomor_bpkb'),
            'perolehan' => $request->input('perolehan'),
        ];
        $peralatan_dan_mesin->update($dataPeralatanDanMesin);

        if ($idPengadaan > 0) {
            return redirect()->route('pengadaan.show', $idPengadaan)->with('message_update', 'Data Peralatan dan Mesin Berhasil Diupdate');
        } else {
            return redirect()->route('peralatan_dan_mesin.index')->with('message_update', 'Data Peralatan dan Mesin Berhasil Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peralatan_dan_mesin = peralatan_dan_mesin::findOrFail($id);
        $aset = aset::findOrFail($peralatan_dan_mesin->id_aset);
        
        // Delete the peralatan dan mesin record
        $peralatan_dan_mesin->delete();
        
        // Delete the associated aset record
        $aset->delete();

        return back()->with('message_delete', 'Data Peralatan dan Mesin Berhasil Dihapus');
    }
}
