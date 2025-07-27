<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    protected $table = 'rekening';

    protected $fillable = [
        'kode',
        'nama_rekening',
    ];

    public function aset()
    {
        return $this->hasMany('App\Models\aset', 'id_rekening');
    }
}
