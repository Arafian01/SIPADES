<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tanah extends Model
{
    protected $table = 'tanah';

    protected $fillable = [
        'id_aset',
        'kode_pemilik',
        'luas',
        'status',
        'tanggal_sertifikat',
        'nomor_sertifikat',
        'perolehan',
        'alamat',
        'kode_lokasi',
        'lokasi_desa',
        'batas_utara',
        'batas_timur',
        'batas_selatan',
        'batas_barat',
        'keterangan',
    ];

    public function aset()
    {
        return $this->belongsTo('App\Models\aset', 'id_aset');
    }
}
