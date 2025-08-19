<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\aset_tetap_lainnya;
use App\Models\gedung_dan_bangunan;
use App\Models\jalan_irigasi_dan_jaringan;
use App\Models\kontruksi_dalam_pengerjaan;
use App\Models\peralatan_dan_mesin;
use App\Models\rekening;
use App\Models\tanah;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.report.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rekening = rekening::all();
        $aset = aset::all();
        $tanah = tanah::all();
        $gedung_dan_bangunan = gedung_dan_bangunan::all();
        $aset_tetap_lainnya = aset_tetap_lainnya::all();
        $jalan_irigasi_dan_jaringan = jalan_irigasi_dan_jaringan::all();
        $peralatan_dan_mesin = peralatan_dan_mesin::all();
        $kontruksi_dalam_Pengerjaan = kontruksi_dalam_pengerjaan::all();
        return view('page.report.cetak_semua')->with([
            'rekening' => $rekening,
            'aset' => $aset,
            'tanah' => $tanah,
            'gedung_dan_bangunan' => $gedung_dan_bangunan,
            'aset_tetap_lainnya' => $aset_tetap_lainnya,
            'jalan_irigasi_dan_jaringan' => $jalan_irigasi_dan_jaringan,
            'peralatan_dan_mesin' => $peralatan_dan_mesin,
            'kontruksi_dalam_pengerjaan' => $kontruksi_dalam_Pengerjaan
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dari = request('dari', 'all');
        $sampai = request('sampai', 'all');

        $dari = ($dari === 'all') ? null : $dari;
        $sampai = ($sampai === 'all') ? null : $sampai;

        $rekening = rekening::all();
        $aset = aset::all();
        $tanah = tanah::all();
        
        if($dari === null){
            $data = kontruksi_dalam_pengerjaan::all();
        }else{
            $data = kontruksi_dalam_pengerjaan::whereBetween('tanggal', [$dari, $sampai])->get();
        }
        
        return view('page.report.golongan.printLaporanKontruksi_dalam_Pengerjaan')->with(['data' => $data], ['rekening' => $rekening], ['aset' => $aset], ['tanah' => $tanah]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cetakSemua(Request $request)
    {
        // Ambil semua data yang dibutuhkan untuk masing-masing laporan
        $aset = aset::all();
        $tanah = tanah::all();
        $rekening = rekening::all();
        $peralatan_dan_mesin = peralatan_dan_mesin::all();
        $kontruksi_dalam_Pengerjaan = kontruksi_dalam_pengerjaan::all();
        $jalan_irigasi_dan_jaringan = jalan_irigasi_dan_jaringan::all();
        $gedung_dan_bangunan = gedung_dan_bangunan::all();
        $aset_tetap_lainnya = aset_tetap_lainnya::all();

        // Kirim semua data ke 1 view
        return view('page.golongan.tanah.index', compact(
            'aset',
            'tanah',
            'rekening',
            'peralatan_dan_mesin',
            'kontruksi_dalam_pengerjaan',
            'jalan_irigasi_dan_jaringan',
            'gedung_dan_bangunan',
            'aset_tetap_lainnya'
        ));
    }
}
