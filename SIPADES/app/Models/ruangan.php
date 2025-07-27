<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    protected $table = 'ruangan';

    protected $fillable = [
        'id_pengguna',
        'kode_ruangan',
        'nama_ruangan',
    ];

    public function pengguna()
    {
        return $this->belongsTo('App\Models\pengguna', 'id_pengguna');
    }
}
