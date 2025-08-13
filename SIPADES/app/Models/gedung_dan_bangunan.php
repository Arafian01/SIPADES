<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gedung_dan_bangunan extends Model
{
    protected $table = 'gedung_dan_bangunan';

    protected $fillable = [
        'id_aset',
        'kode_pemilik',
        'luas_lantai',
        'bertingkat',
        'beton',
        'no_dokumen',
        'tanggal_dokumen',
        'id_tanah',
        'perolehan',
        'alamat',
    ];

    public function aset()
    {
        return $this->belongsTo('App\Models\aset', 'id_aset');
    }

    public function tanah()
    {
        return $this->belongsTo('App\Models\tanah', 'id_tanah');
    }
}
