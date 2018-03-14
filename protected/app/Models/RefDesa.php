<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefDesa extends Model
{
    protected $table = 'ref_desa';
    protected $primaryKey = 'id_desa';
    protected $fillable = ['id_kecamatan','kd_desa','id_desa','status_desa','nama_desa','id_zona'];

    public $timestamps = false;

    public function ref_kecamatan()
    {
      return $this->belongsTo('App\Models\RefKecamatan','id_kecamatan');
    }

}
