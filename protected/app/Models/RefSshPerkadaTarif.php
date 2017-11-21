<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefSshPerkadaTarif extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_ssh_perkada_tarif';
    protected $primaryKey = 'id_tarif_perkada';
    protected $fillable = ['id_tarif_perkada','no_urut','id_tarif_ssh','id_rekening','id_zona_perkada','jml_rupiah'];

    public $timestamps = false;

    public function refsshtarif()
    {
      return $this->belongsTo('App\Models\RefSshTarif', 'id_tarif_ssh');
    }

    public function refsshperkadazona()
    {
      return $this->belongsTo('App\Models\RefSshPerkadaZona', 'id_zona_perkada');
    }


}
