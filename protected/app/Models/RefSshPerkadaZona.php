<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefSshPerkadaZona extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_ssh_perkada_zona';
    protected $primaryKey = 'id_zona_perkada';
    protected $fillable = ['id_zona_perkada','no_urut','id_perkada','id_zona',];

    public $timestamps = false;

    public function refsshperkada()
    {
      return $this->belongsTo('App\Models\RefSshPerkada', 'id_perkada');
    }

    public function refsshzona()
    {
      return $this->belongsTo('App\Models\RefSshZona', 'id_zona');
    }

    public function refsshperkadatarif()
    {
      return $this->hasMany('App\Models\RefSshPerkadaTarif', 'id_zona_perkada');
    }


}
