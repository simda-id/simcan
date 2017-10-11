<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefLokasi extends Model
{
    protected $table = 'ref_lokasi';
    protected $primaryKey = 'id_lokasi';
    public $timestamps = false;
}
