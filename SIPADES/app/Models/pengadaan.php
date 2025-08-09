<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengadaan extends Model
{
    protected $table = 'pengadaan';

    protected $fillable = [
        'id_pengguna',
        'no_pengadaan',
        'tanggal_pengadaan',
        'no_kuitansi',
        'tanggal_spp',
        'no_bast',
        'tanggal_bast',
        'nama_rekanan',
        'uraian',
    ];

    public function pengguna()
    {
        return $this->belongsTo('App\Models\pengguna', 'id_pengguna');
    }

    public function detailPengadaan()
    {
        return $this->hasMany('App\Models\detail_pengadaan', 'id_pengadaan');
    }

    public function aset()
    {
        return $this->hasMany('App\Models\aset', 'id_pengadaan');
    }
    public function kontruksiDalamPengerjaan()
    {
        return $this->hasMany('App\Models\kontruksi_dalam_pengerjaan', 'id_pengadaan');
    }
    public function gtanah()
    {
        return $this->hasMany('App\Models\gtanah', 'id_pengadaan');
    }
    public function gperalatanDanMesin()
    {
        return $this->hasMany('App\Models\gperalatan_dan_mesin', 'id_pengadaan');
    }
    public function ggedungDanBangunan()
    {
        return $this->hasMany('App\Models\ggedung_dan_bangunan', 'id_pengadaan');
    }
    public function gjalanIrigasiDanJaringan()
    {
        return $this->hasMany('App\Models\gjalan_irigasi_dan_jaringan', 'id_pengadaan');
    }
    public function gasetTetapLainnya()
    {
        return $this->hasMany('App\Models\gaset_tetap_lainnya', 'id_pengadaan');
    }
    public function gkontruksiDalamPengerjaan()
    {
        return $this->hasMany('App\Models\gkontruksi_dalam_pengerjaan', 'id_pengadaan');
    }   
    public function asetTetapLainnya()
    {
        return $this->hasMany('App\Models\aset_tetap_lainnya', 'id_pengadaan');
    }   
    public function rekening()
    {
        return $this->belongsTo('App\Models\rekening', 'id_rekening');
    }
    public function ruangan()
    {
        return $this->belongsTo('App\Models\ruangan', 'id_ruangan');
    }
    
}
