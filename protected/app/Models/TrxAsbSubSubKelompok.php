<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbSubSubKelompok extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'trx_asb_sub_sub_kelompok';
    protected $fillable = ['id_asb_sub_sub_kelompok', 'id_asb_sub_kelompok', 'uraian_sub_sub_kelompok_asb'];
    protected $primaryKey = 'id_asb_sub_sub_kelompok';

    public $timestamps = false;

    public function trxasbsubkelompok()
    {
      return $this->belongsTo('App\Models\TrxAsbSubKelompok','id_asb_sub_kelompok');
    }

    public function trxasbaktivitas()
    {
      return $this->hasMany('App\Models\TrxAsbAktivitas', 'id_asb_sub_sub_kelompok');
    }

}
