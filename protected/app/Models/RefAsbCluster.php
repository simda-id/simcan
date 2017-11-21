<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefAsbCluster extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_asb_cluster';
    protected $primaryKey = 'id_ref_cluster_asb';
    protected $fillable = ['id_ref_cluster_asb','uraian_cluster_asb',];

    public $timestamps = false;

    public function trxasbaktivitas()
    {
      return $this->hasMany('App\Models\TrxAsbAktivitas', 'id_ref_cluster_asb');
    }


}
