<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefKecamatan extends Model
{
    protected $table = 'ref_kecamatan';
    protected $primaryKey = 'id_kecamatan';
    // protected $relations = [];

    public $timestamps = false;
}
