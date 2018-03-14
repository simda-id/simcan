<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefAsbKomponen extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_asb_komponen';
    protected $fillable = ['id_aktivitas_asb','id_komponen_asb','nm_komponen_asb','satuan_komponen_asb','jenis_komponen_asb','volume_1',
'id_satuan_1','volume_2','id_satuan_2','id_rekening','diskripsi_lingkup_aktivitas',];
    protected $primaryKey = 'id_komponen_asb';

    public $timestamps = false;

    public function refasbkomponenrinci()
    {
      return $this->hasMany('App\Models\RefAsbKomponenRinci', 'id_komponen_asb');
    }

    public function trxperhitungankomponen()
    {
      return $this->belongsTo('App\Models\TrxAsbPerhitunganKomponen', 'id_komponen_asb');
    }


}
