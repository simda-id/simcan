<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class refsshtarif extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_ssh_tarif';
    protected $primaryKey = 'id_tarif_ssh';
    protected $fillable = ['id_tarif_ssh','no_urut','id_sub_kelompok_ssh','uraian_tarif_ssh','id_satuan',];

    public $timestamps = false;

    public function refsshsubkelompok()
    {
      return $this->belongsTo('App\Models\RefSshSubKelompok', 'id_sub_kelompok_ssh');
    }

    public function refsshrekening()
    {
      return $this->hasMany('App\Models\RefSshRekening', 'id_tarif_ssh');
    }

    public function refsatuan()
    {
      return $this->belongsTo('App\Models\RefSatuan', 'id_satuan');
    }
}
