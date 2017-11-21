<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefAsbPerkada extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_asb_perkada';
    protected $fillable = ['id_perkada','nomor_perkada','tanggal_perkada','tahun_berlaku','uraian_perkada','flag',];
    protected $primaryKey = 'id_perkada';

    public $timestamps = false;

    public function trxasbaktivitas()
    {
      return $this->hasMany('App\Models\TrxAsbAktivitas', 'id_perkada');
    }

    public function trxasbperhitungan()
    {
      return $this->hasMany('App\Models\TrxAsbPerhitungan', 'id_perkada');
    }


}
