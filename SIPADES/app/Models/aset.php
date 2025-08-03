<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aset extends Model
{
    protected $table = 'aset';

    protected $fillable = [
        'id_barang',
        'nomor_register',
        'id_rekening',
        'nama_label',
        'kode_belanja_bidang',
        'asal',
        'sumber_dana',
        'nilai_perolehan',
        'kondisi',
        'tanggal_pembukuan',
        'keterangan',
    ];

    public function rekening()
    {
        return $this->belongsTo('App\Models\rekening', 'id_rekening');
    }
}
