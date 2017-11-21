<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefAsbAktivitas extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_asb_aktivitas';
    protected $fillable = ['id_aktivitas_asb','no_urut','id_perkada','id_ref_cluster_asb','nm_aktivitas_asb','satuan_aktivitas','volume_1',
'id_satuan_1','volume_2','id_satuan_2','diskripsi_aktivitas','range_max','kapasitas_max'];
    protected $primaryKey = 'id_aktivitas_asb';

    public $timestamps = false;

    public function refasbperkada()
    {
      return $this->belongsTo('App\Models\RefAsbPerkada', 'id_perkada');
    }

    public function refsatuanaktivitas()
    {
      return $this->belongsTo('App\Models\RefSatuan','satuan_aktivitas', 'id_satuan');
    }

    public function trxperhitunganaktivitas()
    {
      return $this->belongsTo('App\Models\TrxAsbPerhitunganAktivitas', 'id_aktivitas_asb');
    }

}
