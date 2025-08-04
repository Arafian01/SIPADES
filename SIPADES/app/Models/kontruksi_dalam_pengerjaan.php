<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kontruksi_dalam_pengerjaan extends Model
{
    protected $table = 'kotruksi_dalam_pengerjaan';

    protected $fillable = [
        'id_aset',
        'nomor_dokumen',
        'tanggal_dokumen',
    ];

    public function aset()
    {
        return $this->belongsTo('App\Models\aset', 'id_aset');
    }
}
