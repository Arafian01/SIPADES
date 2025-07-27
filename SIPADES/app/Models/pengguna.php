<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table = 'pengguna';

    protected $fillable = [
        'nama_perangkat',
        'jabatan',
        'nama_jabatan',
        'jabatan_tim_inventarisasi',
    ];

    public function ruangan()
    {
        return $this->hasMany('App\Models\ruangan', 'id_pengguna');
    }

    public function pengadaan()
    {
        return $this->hasMany('App\Models\pengadaan', 'id_pengguna');
    }
}
