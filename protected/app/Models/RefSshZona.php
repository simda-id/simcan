<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefSshZona extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_ssh_zona';
    protected $primaryKey = 'id_zona';
    protected $fillable = ['id_zona','keterangan_zona','diskripsi_zona'];

    public $timestamps = false;

    public function refsshperkadazona()
    {
      return $this->hasMany('App\Models\RefSshPerkadaZona', 'id_zona');
    }



}
