<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRancanganIndikator extends Model
{
    protected $table = 'trx_renja_rancangan_indikator';
    protected $primaryKey = 'id_indikator_program_renja';
    // protected $relations = [];

    public $timestamps = false;

    // public $fillable = [
    // 	'name',
    // 	'address',
    // 	'lat',
    // 	'lng',
    // ];
}
