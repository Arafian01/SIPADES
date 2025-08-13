<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jalan_irigasi_dan_jaringan extends Model
{
    protected $table = 'jalan_irigasi_dan_jaringan';

    protected $fillable = [
        'id_aset',
        'kode_pemilik',
        'kontruksi',
        'panjang',
        'lebar',
        'luas',
        'no_dokumen',
        'tanggal_dokumen',
        'id_tanah',
        'perolehan',
        'lokasi',
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
