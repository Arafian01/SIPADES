<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class golongan extends Model
{
    protected $table = 'golongan';

    protected $fillable = [
        'nama_golongan',
    ];

    public function rekening()
    {
        return $this->hasMany('App\Models\rekening', 'id_golongan');
    }


}
