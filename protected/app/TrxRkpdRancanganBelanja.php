<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRkpdRancanganBelanja extends Model
{
    protected $table = 'trx_rkpd_rancangan_belanja';
    protected $primaryKey = 'id_belanja_rkpd';
    // protected $relations = [];

    public $timestamps = false;

    // public $fillable = [
    // 	'name',
    // 	'address',
    // 	'lat',
    // 	'lng',
    // ];
}
