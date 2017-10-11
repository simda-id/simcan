<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefKegiatan extends Model
{
    protected $table = 'ref_kegiatan';
    protected $primaryKey = 'id_kegiatan';
    // protected $relations = [];

    public $timestamps = false;
}
