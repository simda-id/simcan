<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbPerhitunganKomponen extends Model
{
    protected $table = 'trx_perhitungan_komponen';
    protected $fillable = ['id_komponen_asb','id_perhitungan_aktivitas','id_perhitungan_komponen','no_urut','pagu_komponen',];
    protected $primaryKey = 'id_perhitungan_komponen';

    public $timestamps = false;

    public function trxperhitunganaktivitas()
    {
      return $this->belongsTo('App\Models\TrxAsbPerhitunganAktivitas', 'id_perhitungan_aktivitas');
    }

    public function refasbkomponen()
    {
      return $this->belongsTo('App\Models\RefAsbKomponen', 'id_komponen_asb');
    }



}
