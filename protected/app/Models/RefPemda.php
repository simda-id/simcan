<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefPemda extends Model
{
    //
    
    protected $table = 'ref_pemda';
    protected $primaryKey = 'id_pemda';
    protected $fillable = ['kd_prov','kd_kab','id_pemda','nm_prov','nm_kabkota','ibu_kota','nama_jabatan_kepala_daerah','nama_kepala_daerah','nama_jabatan_sekretariat_daerah','nama_sekretariat_daerah','nip_sekretariat_daerah','unit_perencanaan','nama_kepala_bappeda','nip_kepala_bappeda','unit_keuangan','nama_kepala_bpkad','nip_kepala_bpkad'];

    public $timestamps = false;

    public function ref_kecamatan()
    {
      return $this->hasMany('App\Models\RefKecamatan','id_pemda');
    }


 }
