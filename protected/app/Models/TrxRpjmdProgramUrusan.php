<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRpjmdProgramUrusan extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_rpjmd_program_urusan';
    protected $primaryKey = 'id_urbid_rpjmd';
    protected $fillable = ['thn_id','no_urut','id_urbid_rpjmd','id_program_rpjmd','id_bidang'];

    public function trx_rpjmd_program()
    {
      return $this->belongsTo('App\Models\TrxRpjmdProgram','id_program_rpjmd');
    }

    public function ref_bidang()
    {
      return $this->belongsTo('App\Models\RefBidang','id_bidang');
    }


}
