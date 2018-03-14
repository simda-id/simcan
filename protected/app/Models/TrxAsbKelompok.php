<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbKelompok extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'trx_asb_kelompok';
    protected $fillable = ['id_asb_kelompok', 'id_asb_perkada', 'uraian_kelompok_asb'];
    protected $primaryKey = 'id_asb_kelompok';

    public $timestamps = false;

    public function trxasbperkada()
    {
      return $this->belongsTo('App\Models\TrxAsbPerkada', 'id_asb_perkada');
    }

    public function trxasbsubkelompok()
    {
      return $this->hasMany('App\Models\TrxAsbSubKelompok','id_asb_kelompok');
    }

}
