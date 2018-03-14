<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxAsbKomponenRinci extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'trx_asb_komponen_rinci';
    protected $fillable = ['id_komponen_asb_rinci', 'id_komponen_asb', 'jenis_biaya', 'id_tarif_ssh', 'koefisien1', 'id_satuan1','sat_derivatif1', 'koefisien2', 'id_satuan2', 'sat_derivatif2' ,'koefisien3', 'id_satuan3','ket_group','hub_driver'];
    protected $primaryKey = 'id_komponen_asb_rinci';

    public $timestamps = false;

    public function trxasbkomponen()
    {
      return $this->belongsTo('App\Models\TrxAsbKomponen', 'id_komponen_asb');
    }

    public function refsshtarif()
    {
      return $this->belongsTo('App\Models\RefSshTarif', 'id_tarif_ssh');
    }

    // public function trxasbperhitunganrinci()
    // {
    //   return $this->hasMany('App\Models\TrxAsbPerhitunganRinci', 'id_komponen_asb_rinci');
    // }
}
