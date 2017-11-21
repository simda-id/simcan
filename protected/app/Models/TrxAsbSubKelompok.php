<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbSubKelompok extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'trx_asb_sub_kelompok';
    protected $fillable = ['id_asb_sub_kelompok', 'id_asb_kelompok', 'uraian_sub_kelompok_asb'];
    protected $primaryKey = 'id_asb_sub_kelompok';

    public $timestamps = false;

    public function trxasbkelompok()
    {
      return $this->belongsTo('App\Models\TrxAsbKelompok','id_asb_kelompok');
    }

    public function trxasbsubsubkel()
    {
      return $this->hasMany('App\Models\TrxAsbSubSubKelompok', 'id_asb_sub_kelompok');
    }

}
