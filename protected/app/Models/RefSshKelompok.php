<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class refsshkelompok extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_ssh_kelompok';
    protected $primaryKey = 'id_kelompok_ssh';
    protected $fillable = ['id_kelompok_ssh','id_golongan_ssh','no_urut','uraian_kelompok_ssh',];

    public $timestamps = false;

    public function refsshgolongan()
    {
      return $this->belongsTo('App\Models\RefSshGolongan', 'id_golongan_ssh');
    }

    public function refsshsubkelompok()
    {
      return $this->hasMany('App\Models\RefSshSubKelompok', 'id_kelompok_ssh');
    }
}
