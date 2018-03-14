<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class refsshrekening extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_ssh_rekening';
    protected $primaryKey ='id_rekening_ssh';
    protected $fillable = ['id_rekening_ssh','id_tarif_ssh','id_rekening','uraian_tarif_ssh',];

    public $timestamps = false;

    public function refsshtarif()
    {
      return $this->belongsTo('App\Models\RefSshTarif', 'id_tarif_ssh');
    }

    public function refrekening()
    {
      return $this->belongsTo('App\Models\RefRek5', 'id_rekening');
    }

}
