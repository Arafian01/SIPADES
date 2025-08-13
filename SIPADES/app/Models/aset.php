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
        'tanggal_perolehan',
        'keterangan',
    ];

    public function rekening()
    {
        return $this->belongsTo('App\Models\rekening', 'id_rekening');
    }
   
    public function pengadaan()
    {
        return $this->belongsTo('App\Models\pengadaan', 'id_pengadaan');
    }
    public function detailPengadaan()
    {
        return $this->hasMany('App\Models\detail_pengadaan', 'id_aset');
    }
    public function kontruksiDalamPengerjaan()
    {
        return $this->hasMany('App\Models\kontruksi_dalam_pengerjaan', 'id_aset');
    }
    public function gtanah()
    {
        return $this->hasMany('App\Models\gtanah', 'id_aset');
    }
    public function gperalatanDanMesin()
    {
        return $this->hasMany('App\Models\gperalatan_dan_mesin', 'id_aset');
    }
    public function ggedungDanBangunan()
    {
        return $this->hasMany('App\Models\ggedung_dan_bangunan', 'id_aset');
    }
    public function gjalanIrigasiDanJaringan()
    {
        return $this->hasMany('App\Models\gjalan_irigasi_dan_jaringan', 'id_aset');
    }
    public function gasetTetapLainnya()
    {
        return $this->hasMany('App\Models\gaset_tetap_lainnya', 'id_aset');
    }
}
