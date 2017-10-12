<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRkpdRanwalPelaksana extends Model
{
    //
    protected $table = 'trx_rkpd_ranwal_pelaksana';

    protected $primaryKey = 'id_pelaksana_rpjmd';

    public $timestamps = false;    
    
    public function getUnit() {
        return $this->hasOne('App\RefUnit', 'id_unit', 'id_unit');
    }    
}
