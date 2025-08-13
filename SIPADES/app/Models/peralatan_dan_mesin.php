<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peralatan_dan_mesin extends Model
{
    protected $table = 'peralatan_dan_mesin';
    
    protected $fillable = [
        'id_aset',
        'kode_pemilik',
        'ruang',
        'merk',
        'ukuran',
        'bahan',
        'nomor_pabrik',
        'nomor_rangka',
        'nomor_mesin',
        'nomor_polisi',
        'nomor_bpkb',
        'perolehan',
    ];

    public function aset()
    {
        return $this->belongsTo('App\Models\aset', 'id_aset');
    }
}
