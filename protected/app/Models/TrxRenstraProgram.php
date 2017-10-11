<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRenstraProgram extends Model
{
    public $timestamps = false;
    protected $table = 'trx_renstra_program';
    protected $primaryKey = 'id_program_renstra';
    protected $fillable = ['thn_id','no_urut','id_sasaran_renstra','id_program_renstra','id_program_rpjmd','id_program_ref','id_perubahan','uraian_program_renstra',];

    public function trx_renstra_sasaran()
    {
      return $this->belongsTo('App\Models\TrxRenstraSasaran','id_sasaran_renstra');
    }

    public function trx_rpjmd_program()
    {
      return $this->belongsTo('App\Models\TrxRpjmdProgram','id_program_rpjmd');
    }

    public function ref_program()
    {
      return $this->belongsTo('App\Models\RefProgram','id_program_ref','id_program');
    }

}
