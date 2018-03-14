<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbKomponen extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'trx_asb_komponen';
    protected $fillable = ['id_aktivitas_asb', 'id_komponen_asb', 'nm_komponen_asb', 'id_rekening'];
    protected $primaryKey = 'id_komponen_asb';

    public $timestamps = false;

    public function trxasbkomponenrinci()
    {
      return $this->hasMany('App\Models\TrxAsbKomponenRinci', 'id_komponen_asb');
    }

    public function trxasbaktivitas()
    {
      return $this->belongsTo('App\Models\TrxAsbAktivitas', 'id_aktivitas_asb');
    }

    public function refrekening()
    {
      return $this->belongsTo('App\Models\RefRek5', 'id_rekening');
    }
}
