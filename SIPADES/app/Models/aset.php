<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aset extends Model
{
    protected $table = 'aset';

    protected $fillable = [
        'id_rekening',
        'kode_aset',
        'nama_aset',
        'sumber_dana',
        'nilai_perolehan',
    ];

    public function rekening()
    {
        return $this->belongsTo('App\Models\rekening', 'id_rekening');
    }
}
