<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class refsshgolongan extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_ssh_golongan';
    protected $primaryKey='id_golongan_ssh';
    protected $fillable = ['id_golongan_ssh','no_urut','uraian_golongan_ssh',];

    public $timestamps = false;

    public function refsshkelompok()
    {
      return $this->hasMany('App\Models\RefSshKelompok', 'id_golongan_ssh');
    }



}
