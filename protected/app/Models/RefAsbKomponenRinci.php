<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefAsbKomponenRinci extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_asb_komponen_rinci';
    protected $fillable = ['id_komponen_asb_rinci','id_komponen_asb','id_tarif_ssh','id_rekening','volume','koefisien','satuan',];
    protected $primaryKey = 'id_komponen_asb_rinci';

    public $timestamps = false;

    public function refasbkomponen()
    {
      return $this->belongsTo('App\Models\RefAsbKomponen', 'id_komponen_asb');
    }

    public function refsshtarif()
    {
      return $this->belongsTo('App\Models\RefSshTarif', 'id_tarif_ssh');
    }

    public function refrekening()
    {
      return $this->belongsTo('App\Models\RefRek5', 'id_rekening');
    }

    public function trxasbperhitunganrinci()
    {
      return $this->hasMany('App\Models\TrxAsbPerhitunganRinci', 'id_komponen_asb_rinci');
    }
}
