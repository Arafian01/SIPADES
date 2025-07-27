<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = pengguna::all();
        return view('page.pengguna.index')->with([
            'pengguna' => $pengguna
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
            'nama_perangkat' => $request->input('nama_perangkat'),
            'jabatan' => $request->input('jabatan'),
            'nama_jabatan' => $request->input('nama_jabatan'),
            'jabatan_tim_inventarisasi' => $request->input('jabatan_tim_inventarisasi'),
        ];
        pengguna::create($data);
        return back()->with('message_delete', 'Data Pengguna Berhasil Ditambahkan');
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
            'nama_perangkat' => $request->input('nama_perangkat'),
            'jabatan' => $request->input('jabatan'),
            'nama_jabatan' => $request->input('nama_jabatan'),
            'jabatan_tim_inventarisasi' => $request->input('jabatan_tim_inventarisasi'),
        ];

        $pengguna = pengguna::findOrFail($id);
        $pengguna->update($data);

        return back()->with('message_delete', 'Data Pengguna Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = pengguna::findOrFail($id);
        $pengguna->delete();
        return back()->with('message_delete', 'Data Pengguna Sudah Dihapus');
    }
}
