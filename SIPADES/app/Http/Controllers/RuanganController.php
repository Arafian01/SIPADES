<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use App\Models\ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangan = ruangan::paginate(5);
        $pengguna = pengguna::all();
        return view('page.ruangan.index')->with([
            'ruangan' => $ruangan,
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
            'kode_ruangan' => $request->input('kode_ruangan'),
            'nama_ruangan' => $request->input('nama_ruangan'),
            'id_pengguna' => $request->input('id_pengguna'),
        ];
        ruangan::create($data);
        return back()->with('success_message', 'Data Ruangan Berhasil Ditambahkan');
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
            'kode_ruangan' => $request->input('kode_ruangan'),
            'nama_ruangan' => $request->input('nama_ruangan'),
            'id_pengguna' => $request->input('id_pengguna'),
        ];
        ruangan::where('id', $id)->update($data);
        return back()->with('success_message', 'Data Ruangan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruangan = ruangan::find($id);
        if ($ruangan) {
            $ruangan->delete();
            return back()->with('success_message', 'Data Ruangan Berhasil Dihapus');
        }
        return back()->with('message_error', 'Data Ruangan Tidak Ditemukan');
    }
}
