<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefSshZonaLokasi extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_ssh_zona_lokasi';
    protected $primaryKey = 'id_zona_lokasi';
    protected $fillable = ['id_zona_lokasi','id_zona','id_lokasi','id_desa','diskripsi_lokasi'];

    public $timestamps = false;

    public function refsshzona()
    {
      return $this->belongsTo('App\Models\RefSshZona', 'id_zona');
    }



}
