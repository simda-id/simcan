<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRenstraSasaran extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_renstra_sasaran';
    protected $primaryKey = 'id_sasaran_renstra';
    protected $fillable = ['thn_id','no_urut','id_tujuan_renstra','id_sasaran_renstra','id_perubahan','uraian_sasaran_renstra',];

    public function trx_renstra_tujuan()
    {
      return $this->belongsTo('App\Models\TrxRenstraTujuan','id_tujuan_renstra');
    }
    public function trx_renstra_kebijakan()
    {
      return $this->hasMany('App\Models\TrxRentraKebijakan','id_sasaran_renstra');
    }
    public function trx_renstra_strategi()
    {
      return $this->hasMany('App\Models\TrxRenstraStrategi','id_sasaran_renstra');
    }
    public function trx_renstra_program()
    {
      return $this->hasMany('App\Models\TrxRenstraProgram','id_sasaran_renstra');
    }
}
