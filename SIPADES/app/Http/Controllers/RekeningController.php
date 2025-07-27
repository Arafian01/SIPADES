<?php

namespace App\Http\Controllers;

use App\Models\rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekening = rekening::all();
        return view('page.rekening.index')->with([
            'rekening' => $rekening
        ]);
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
        $data = [
            'kode' => $request->input('kode'),
            'nama_rekening' => $request->input('nama_rekening'),
        ];

        rekening::create($data);

        return back()->with('message_delete', 'Data Rekening Berhasil Ditambahkan');
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
        $data = [
            'kode' => $request->input('kode'),
            'nama_rekening' => $request->input('nama_rekening'),
        ];

        $datas = rekening::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data rekening berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = rekening::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data rekening Sudah dihapus');
    }
}
