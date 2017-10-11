<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRkpdRancanganIndikator extends Model
{
    //
    protected $table = 'trx_rkpd_rancangan_indikator';
    protected $primaryKey = 'id_indikator_rkpd';

    public $timestamps = false;    
}
