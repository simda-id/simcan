<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbPerhitunganAktivitas extends Model
{
    protected $table = 'trx_perhitungan_aktivitas';
    protected $fillable = ['id_perhitungan_aktivitas','id_perhitungan','id_aktivitas_asb','id_komponen_asb','id_komponen_asb_rinci','id_tarif_ssh','harga_satuan','jml_pagu',];
    protected $primaryKey = 'id_perhitungan_aktivitas';

    public $timestamps = false;

    public function trxasbperhitungan()
    {
      return $this->belongsTo('App\Models\TrxAsbPerhitungan', 'id_perhitungan');
    }

    public function trxperhitungankomponen()
    {
      return $this->hasMany('App\Models\TrxAsbPerhitunganKomponen', 'id_perhitungan_aktivitas');
    }

    public function refasbaktivitas()
    {
      return $this->belongsTo('App\Models\TrxAsbAktivitas', 'id_aktivitas_asb');
    }

}
