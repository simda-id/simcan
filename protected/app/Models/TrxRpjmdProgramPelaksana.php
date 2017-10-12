<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRpjmdProgramPelaksana extends Model
{
    public $timestamps = false;
    protected $table = 'trx_rpjmd_program_pelaksana';
    protected $primaryKey = 'id_pelaksana_rpjmd';
    protected $fillable = ['thn_id','no_urut','id_urbid_rpjmd','id_pelaksana_rpjmd','id_unit','id_perubahan','pagu_tahun1','pagu_tahun2','pagu_tahun3','pagu_tahun4','pagu_tahun5'];

    public function trx_rpjmd_program_urusan()
    {
      return $this->belongsTo('App\Models\TrxRpjmdProgramUrusan','id_urbid_rpjmd');
    }

    public function ref_unit()
    {
      return $this->belongsTo('App\Models\RefUnit','id_unit');
    }
}
