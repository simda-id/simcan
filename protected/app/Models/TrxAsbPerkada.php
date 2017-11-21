<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbPerkada extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'trx_asb_perkada';
    protected $fillable = ['id_asb_perkada', 'nomor_perkada', 'tanggal_perkada', 'tahun_berlaku', 'uraian_perkada', 'flag'];
    protected $primaryKey = 'id_asb_perkada';

    public $timestamps = false;

    public function trxasbkelompok()
    {
      return $this->hasMany('App\Models\TrxAsbKelompok', 'id_asb_perkada');
    }

}
