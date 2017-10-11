<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRkpdRanwalIndikator extends Model
{
    //
    protected $table = 'trx_rkpd_ranwal_indikator';

    public $timestamps = false;    
    
    public function getUnit() {
        // return $this->hasOne('App\RefUnit', 'id_unit', 'id_unit');
        // ->where('kd_unit', $this->kd_unit);
    }    
}
