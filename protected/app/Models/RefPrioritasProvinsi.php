<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefPrioritasProvinsi extends Model
{
    protected $table = 'ref_prioritas_provinsi';
    protected $primaryKey = 'id_prioritas';
    protected $fillable = ['tahun', 'id_prioritas', 'nama_prioritas'];

    public $timestamps = false;
}
