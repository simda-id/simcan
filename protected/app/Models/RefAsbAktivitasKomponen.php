<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefAsbAktivitasKomponen extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_asb_aktivitas_komponen';
    protected $fillable = ['id_aktivitas_komponen','id_aktivitas_asb','id_komponen_asb','no_urut'];
    protected $primaryKey = 'id_aktivitas_komponen';

    public $timestamps = false;

    public function refasbaktivitas()
    {
      return $this->belongsTo('App\Models\TrxAsbAktivitas', 'id_aktivitas_asb');
    }

    public function refasbkomponen()
    {
      return $this->belongsTo('App\Models\RefAsbKomponen', 'id_komponen_asb');
    }


}
