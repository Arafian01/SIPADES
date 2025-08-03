<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aset_tetap_lainnya extends Model
{
    protected $table = 'aset_tetap_lainnya';

    protected $fillable = [
        'id_aset',
        'kode_pemilik',
        'ruang',
        'judul',
        'pencipta',
        'ukuran',
        'bahan',
        'tanggal_perolehan',
        'perolehan',
    ];

    public function aset()
    {
        return $this->belongsTo('App\Models\aset', 'id_aset');
    }
}
