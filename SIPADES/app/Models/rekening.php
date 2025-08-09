<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    protected $table = 'rekening';

    protected $fillable = [
        'kode',
        'nama_rekening',
        'id_golongan',
    ];

    public function aset()
    {
        return $this->hasMany('App\Models\aset', 'id_rekening');
    }

    public function golongan()
    {
        return $this->belongsTo('App\Models\golongan', 'id_golongan');
    }
}
