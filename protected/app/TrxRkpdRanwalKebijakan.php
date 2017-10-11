<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRkpdRanwalKebijakan extends Model
{
    //
    protected $table = 'trx_rkpd_ranwal_kebijakan';
    protected $primaryKey = 'id_kebijakan_ranwal';

    public $timestamps = false;    
    
    public function getUnit() {
        // return $this->hasOne('App\RefUnit', 'id_unit', 'id_unit');
        // ->where('kd_unit', $this->kd_unit);
    }    
}
