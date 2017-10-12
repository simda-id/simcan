<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRpjmdProgram extends Model
{
    public $timestamps = false;
    protected $table = 'trx_rpjmd_program';
    protected $primaryKey = 'id_program_rpjmd';
    protected $fillable = ['thn_id','no_urut','id_sasaran_rpjmd','id_program_rpjmd','id_perubahan','uraian_program_rpjmd','pagu_tahun1','pagu_tahun2','pagu_tahun3',
'pagu_tahun4','pagu_tahun5','total_pagu',];

    public function trx_rpjmd_sasaran()
    {
      return $this->belongsTo('App\Models\TrxRpjmdSasaran','id_sasaran_rpjmd');
    }

    public function trx_rpjmd_program_indikator()
    {
      return $this->hasMany('App\Models\TrxRpjmdProgramIndikator','id_program_rpjmd');
    }

    public function trx_rpjmd_program_urusan()
    {
      return $this->hasMany('App\Models\TrxRpjmdProgramUrusan','id_program_rpjmd');
    }

}
