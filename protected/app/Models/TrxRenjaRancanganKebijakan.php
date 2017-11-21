<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRancanganKebijakan extends Model
{
    protected $table = 'trx_renja_rancangan_kebijakan';
    protected $primaryKey = 'id_kebijakan_renja';
    // protected $relations = [];

    public $timestamps = false;

    // public $fillable = [
    // 	'name',
    // 	'address',
    // 	'lat',
    // 	'lng',
    // ];
}
