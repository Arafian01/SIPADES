<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\aset_tetap_lainnya;
use App\Models\gedung_dan_bangunan;
use App\Models\golongan;
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
        $dari = $request->input('dari');   // format: Y-m-d
        $sampai = $request->input('sampai');
        $golonganModel = $request->input('aset'); // misal: "Tanah" atau "Gedung"

        // pastikan namespace model benar
        $modelClass = "\\App\\Models\\" . $golonganModel;

        if (!class_exists($modelClass)) {
            return back()->with('error', "Model {$golonganModel} tidak ditemukan");
        }

        // ambil data golongan, filter hanya yg punya aset dalam rentang tanggal_perolehan
        $data = $modelClass::whereHas('aset', function ($query) use ($dari, $sampai) {
            $query->whereBetween('tanggal_perolehan', [$dari, $sampai]);
        })
            ->with(['aset' => function ($query) use ($dari, $sampai) {
                $query->whereBetween('tanggal_perolehan', [$dari, $sampai]);
            }])
            ->get();

        return view("page.report.golongan.printLaporan{$golonganModel}", compact('data', 'dari', 'sampai'));
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
}
