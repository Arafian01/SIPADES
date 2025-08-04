<?php

namespace App\Http\Controllers;

use App\Models\aset;
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
    public function create()
    {
        $aset = aset::all();
        $rekening = rekening::all();
        $ruangan = ruangan::all();
        return view('page.golongan.peralatan_dan_mesin.create', compact('aset', 'rekening', 'ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $dataAset = [
        //     'id_barang' => $request->input('id_barang'),
        //     'nomor_register' => $request->input('no_reg'),
        //     'id_rekening' => $request->input('id_rekening'),
        //     'nama_label' => $request->input('nama_label'),
        //     'kode_belanja_bidang' => $request->input('kode_belanja_bidang'),
        //     'asal' => $request->input('asal'),
        //     'sumber_dana' => $request->input('sumber_dana'),
        //     'nilai_perolehan' => $request->input('nilai_perolehan'),
        //     'kondisi' => $request->input('kondisi'),
        //     'tanggal_pembukuan' => $request->input('tanggal_pembukuan'),
        //     'keterangan' => $request->input('keterangan'),
        // ];
        // aset::create($dataAset);
        // $id_aset = aset::latest()->first()->id;
        // $dataTanah = [
        //     'id_aset' => $id_aset,
        //     'kode_pemilik' => $request->input('kode_pemilik'),
        //     'tanggal_perolehan' => $request->input('tanggal_perolehan'),
        //     'luas' => $request->input('luas'),
        //     'status' => $request->input('status'),
        //     'tanggal_sertifikat' => $request->input('tanggal_sertifikat'),
        //     'nomor_sertifikat' => $request->input('no_sertifikat'),
        //     'perolehan' => $request->input('perolehan'),
        //     'alamat' => $request->input('alamat'),
        //     'kode_lokasi' => $request->input('kode_lokasi'),
        //     'lokasi_desa' => $request->input('kode_lokasi'),
        //     'batas_utara' => $request->input('batas_utara'),
        //     'batas_timur' => $request->input('batas_timur'),
        //     'batas_selatan' => $request->input('batas_selatan'),
        //     'batas_barat' => $request->input('batas_barat'),
        //     'keterangan' => $request->input('keterangan'),
        // ];
        // tanah::create($dataTanah);
        // return back()->with('message_delete', 'Data Tanah Berhasil Ditambahkan');

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

        $dataPeralatanDanMesin = [
            'id_aset' => $id_aset,
            'kode_pemilik' => $request->input('kode_pemilik'),
            'ruang' => $request->input('ruang'),
            'merk' => $request->input('merk'),
            'ukuran' => $request->input('ukuran'),
            'bahan' => $request->input('bahan'),
            'tanggal_perolehan' => $request->input('tanggal_perolehan'),
            'nomor_pabrik' => $request->input('nomor_pabrik'),
            'nomor_rangka' => $request->input('nomor_rangka'),
            'nomor_mesin' => $request->input('nomor_mesin'),
            'nomor_polisi' => $request->input('nomor_polisi'),
            'nomor_bpkb' => $request->input('nomor_bpkb'),
            'perolehan' => $request->input('perolehan'),
        ];
        peralatan_dan_mesin::create($dataPeralatanDanMesin);
        return back()->with('message_delete', 'Data Peralatan dan Mesin Berhasil Ditambahkan');
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
        $peralatan_dan_mesin = peralatan_dan_mesin::findOrFail($id);
        $aset = aset::all();
        $rekening = rekening::all();
        $ruangan = ruangan::all();
        return view('page.golongan.peralatan_dan_mesin.edit', compact('peralatan_dan_mesin', 'aset', 'rekening', 'ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
