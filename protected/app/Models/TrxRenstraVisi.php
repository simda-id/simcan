<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRenstraVisi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_renstra_visi';
    protected $primaryKey = 'id_visi_renstra';
    protected $fillable = ['thn_id','no_urut','id_visi_renstra','id_unit','id_perubahan','thn_awal_renstra','thn_akhir_renstra','uraian_visi_renstra','id_status_dokumen',];

	public function trx_renstra_misi()
  {
      return $this->belongsTo('App\Models\TrxRenstraMisi','id_visi_renstra');
    }

  public function ref_unit()
    {
      return $this->belongsTo('App\Models\RefUnit','id_unit');
    }

}
