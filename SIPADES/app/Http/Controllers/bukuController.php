<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\rekening;
use Illuminate\Http\Request;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.report.buku.index'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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

        if($dari === null){
            $data = aset::all();
        }else{
            $data = aset::whereBetween('tanggal', [$dari, $sampai])->get();
        }
        
        return view('page.report.buku.printLaporan')->with(['data' => $data], ['rekening' => $rekening]);
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
