<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbPerhitunganASb extends Model
{
    protected $table = 'trx_perhitungan_asb';
    protected $fillable = ['tahun_perhitungan','id_perhitungan','id_perkada','flag_aktif'];
    protected $primaryKey = 'id_perhitungan';

    public $timestamps = false;

    public function refasbperkada()
    {
      return $this->belongsTo('App\Models\RefAsbPerkada', 'id_perkada');
    }

    public function trxperhitunganaktivitas()
    {
      return $this->hasMany('App\Models\TrxAsbPerhitunganAktivitas', 'id_perhitungan');
    }

}
