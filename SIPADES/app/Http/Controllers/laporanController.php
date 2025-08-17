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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('page.report.index', compact(
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
