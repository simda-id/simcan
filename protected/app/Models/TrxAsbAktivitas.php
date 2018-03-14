<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbAktivitas extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'trx_asb_aktivitas';
    protected $fillable = ['id_aktivitas_asb', 'id_asb_sub_kelompok', 'nm_aktivitas_asb', 'satuan_aktivitas', 'volume_1', 'id_satuan_1','sat_derivatif_1', 'volume_2', 'id_satuan_2', 'sat_derivatif_2','diskripsi_aktivitas', 'range_max', 'kapasitas_max', 'range_max1', 'kapasitas_max1'];
    protected $primaryKey = 'id_aktivitas_asb';

    public $timestamps = false;

    public function trxasbsubsubkelompok()
    {
      return $this->belongsTo('App\Models\TrxAsbSubSubKelompok', 'id_asb_sub_sub_kelompok');
    }


    // public function trxperhitunganaktivitas()
    // {
    //   return $this->belongsTo('App\Models\TrxAsbPerhitunganAktivitas', 'id_aktivitas_asb');
    // }

}
