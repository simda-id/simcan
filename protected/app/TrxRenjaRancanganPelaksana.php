<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRancanganPelaksana extends Model
{
    protected $table = 'trx_renja_rancangan_pelaksana';
    protected $primaryKey = 'id_pelaksana_renja';
    // protected $relations = [];

    public $timestamps = false;

    public function getSubUnit() {
        return $this->hasOne('App\RefSubUnit', 'id_sub_unit', 'id_sub_unit');
    }    
}
