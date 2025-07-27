<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengadaan extends Model
{
    protected $table = 'pengadaan';

    protected $fillable = [
        'id_pengguna',
        'no_pengadaan',
        'tanggal_pengadaan',
        'no_kuitansi',
        'tanggal_spp',
        'no_bast',
        'tanggal_bast',
        'nama_rekanan',
        'uraian',
    ];

    public function pengguna()
    {
        return $this->belongsTo('App\Models\pengguna', 'id_pengguna');
    }
}
