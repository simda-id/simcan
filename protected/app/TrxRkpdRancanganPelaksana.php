<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRkpdRancanganPelaksana extends Model
{
    //
    protected $table = 'trx_rkpd_rancangan_pelaksana';
    protected $primaryKey = 'id_pelaksana_rkpd';

    public $timestamps = false;    

    public function getSubUnit() {
        return $this->hasOne('App\RefSubUnit', 'id_sub_unit', 'id_sub_unit');
    }       
}
