<?php

namespace App\Http\Controllers;

use App\Models\golongan;
use App\Models\rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekening = rekening::paginate(10);
        $golongan = golongan::all(); // Assuming you have a Golongan model
        return view('page.rekening.index')->with([
            'rekening' => $rekening,
            'golongan' => $golongan
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

        rekening::create([
            'kode' => implode('.', $request->kode),
            'nama_rekening' => $request->nama_rekening,
            'id_golongan' => $request->golongan_id,
        ]);

        return back()->with('success_message', 'Data Rekening Berhasil Ditambahkan!');
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
    public function update(Request $request, $id)
{
   
    $rekening = rekening::findOrFail($id);
    $rekening->update([
        'kode' => implode('.', $request->kode),
        'nama_rekening' => $request->nama_rekening,
        'id_golongan' => $request->golongan_id,
    ]);

    return back()->with('success_message', 'Data Rekening Berhasil Diupdate!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = rekening::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data rekening Sudah dihapus');
    }
}
