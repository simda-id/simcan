<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRancangan extends Model
{
    protected $table = 'trx_renja_rancangan';
    protected $primaryKey = 'id_renja';
    // protected $relations = [];

    public $timestamps = false;

    public $fillable = [
    	'name',
    	'address',
    	'lat',
    	'lng',
    ];
}
