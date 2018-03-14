<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefSshPerkada extends Model
{
    //
    // protected $fillable = ['id_golongan_ssh', 'no_urut', 'uraian_golongan_ssh'];
    protected $table = 'ref_ssh_perkada';
    protected $primaryKey = 'id_perkada';
    protected $fillable = ['id_perkada','nomor_perkada','tanggal_perkada','tahun_berlaku','uraian_perkada','flag',];

    public $timestamps = false;

    public function refsshzona()
    {
      return $this->hasMany('App\Models\RefSshPerkadaZona', 'id_perkada');
    }

}
