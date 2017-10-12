<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class refsshsubkelompok extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_ssh_sub_kelompok';
    protected $primaryKey = 'id_sub_kelompok_ssh';
    protected $fillable = ['id_sub_kelompok_ssh','id_kelompok_ssh','no_urut','uraian_sub_kelompok_ssh',];

    public $timestamps = false;

    public function refsshkelompok()
    {
      return $this->belongsTo('App\Models\RefSshKelompok', 'id_kelompok_ssh');
    }

    public function refsshtarif()
    {
      return $this->hasMany('App\Models\RefSshTarif', 'id_sub_kelompok_ssh');
    }

}
