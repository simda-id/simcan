<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefKecamatan extends Model
{
    protected $table = 'ref_kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $fillable = ['id_pemda','kd_kecamatan','id_kecamatan','nama_kecamatan'];

    public $timestamps = false;

    public function ref_urusan()
    {
      return $this->belongsTo('App\Models\RefPemda','id_pemda');
    }

}
