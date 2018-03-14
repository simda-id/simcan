<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbPerhitungan extends Model
{
    protected $table = 'trx_asb_perhitungan';
    protected $fillable = ['tahun_perhitungan','id_perhitungan','id_perkada','flag_aktif',];
    protected $primaryKey = 'id_perhitungan';

    public $timestamps = false;

    public function trxperhitunganrinci()
    {
      return $this->hasMany('App\Models\TrxAsbPerhitunganRinci', 'id_perhitungan');
    }

    public function refasbperkada()
    {
      return $this->belongsTo('App\Models\RefAsbPerkada', 'id_perkada');
    }


}
