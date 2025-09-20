<?php

namespace App\Http\Controllers;

use App\Models\pengadaan;
use Illuminate\Http\Request;

class detailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function destroy(string $idPengadaan, String $idDetail)
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
}
