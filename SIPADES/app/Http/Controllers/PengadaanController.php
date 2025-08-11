<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\aset_tetap_lainnya;
use App\Models\gedung_dan_bangunan;
use App\Models\golongan;
use App\Models\jalan_irigasi_dan_jaringan;
use App\Models\kontruksi_dalam_pengerjaan;
use App\Models\pengadaan;
use App\Models\pengguna;
use App\Models\peralatan_dan_mesin;
use App\Models\tanah;
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
public function create(String $id, String $id_golongan, String $id_aset)
{
    $pengadaan = pengadaan::findOrFail($id);
    $golongan  = golongan::findOrFail($id_golongan);

    // Mapping ID Golongan ke Model
    $modelMap = [
        1 => tanah::class,
        2 => peralatan_dan_mesin::class,
        3 => gedung_dan_bangunan::class,
        4 => jalan_irigasi_dan_jaringan::class,
        5 => aset_tetap_lainnya::class,
        6 => kontruksi_dalam_pengerjaan::class,
    ];

    if (!isset($modelMap[$golongan->id])) {
        abort(404, 'Golongan tidak dikenal');
    }

    $modelClass = $modelMap[$golongan->id];

    // Cari data berdasarkan id_aset
    $idgolongan = $modelClass::where('id_aset', $id_aset)->firstOrFail();

    return redirect()->route($golongan->nama_golongan . '.edit', [$idgolongan->id, $pengadaan->id])
        ->with([
            'pengadaan' => $pengadaan,
            'golongan'  => $golongan,
        ]);
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'id_pengguna' => $request->input('id_pengguna'),
            'no_pengadaan' => $request->input('no_pengadaan'),
            'tanggal_pengadaan' => $request->input('tanggal_pengadaan'),
            'no_kuitansi' => $request->input('no_kuitansi'),
            'tanggal_spp' => $request->input('tanggal_spp'),
            'no_bast' => $request->input('no_bast'),
            'tanggal_bast' => $request->input('tanggal_bast'),
            'nama_rekanan' => $request->input('nama_rekanan'),
            'uraian' => $request->input('uraian'),
        ];
        pengadaan::create($data);
        return back()->with('message_delete', 'Data Pengadaan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengadaan = pengadaan::findOrFail($id);
        $pengguna = pengguna::all();
        $pengadaan = Pengadaan::with('detailPengadaan.aset.rekening')->findOrFail($id);
        $golongan = golongan::all();
        return view('page.pengadaan.create')->with([
            'pengadaan' => $pengadaan,
            'pengguna' => $pengguna,
            'golongan' => $golongan,
        ]);
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
    public function destroy(string $idPengadaan, string $idDetail)
    {
        $pengadaan = pengadaan::findOrFail($idPengadaan);
        $detail = $pengadaan->detailPengadaan()->findOrFail($idDetail);
        $aset = $detail->aset;

        if ($detail == null) {
            return back()->with('message_delete', 'Detail Pengadaan atau Aset tidak ditemukan');
        } else if ($aset) {
            // Hapus detail pengadaan
            $detail->delete();

            // Hapus aset terkait jika tidak ada detail lain yang menggunakannya
            if ($aset->detailPengadaan()->count() == 0) {
                $aset->delete();
            }
        } else {
            return back()->with('message_delete', 'Aset tidak ditemukan');

        }


        return back()->with('message_delete', 'Detail Pengadaan Berhasil Dihapus');
    }
    
        // $pengadaan = pengadaan::findOrFail($id);
        // $pengadaan->delete();
        // return back()->with('message_delete', 'Data Pengadaan Berhasil Dihapus');
    
}
