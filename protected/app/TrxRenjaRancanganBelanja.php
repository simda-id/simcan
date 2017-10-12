<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRancanganBelanja extends Model
{
    protected $table = 'trx_renja_rancangan_belanja';
    protected $primaryKey = 'id_belanja_renja';
    // protected $relations = [];

    public $timestamps = false;

    // public $fillable = [
    // 	'name',
    // 	'address',
    // 	'lat',
    // 	'lng',
    // ];
}
