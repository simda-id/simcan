<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxAsbAktivitas extends Model
{
    protected $table = 'trx_asb_aktivitas';
    protected $primaryKey = 'id_aktivitas_asb';
    // protected $relations = [];

    public $timestamps = false;
}
