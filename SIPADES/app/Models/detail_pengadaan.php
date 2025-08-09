<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_pengadaan extends Model
{
    protected $table = 'detail_pengadaan';

    protected $fillable = [
        'id_pengadaan',
        'id_aset',
    ];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }

    public function aset()
    {
        return $this->belongsTo(aset::class, 'id_aset');
    }
}
