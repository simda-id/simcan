<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRenstraMisi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_renstra_misi';
    protected $primaryKey = 'id_misi_renstra';
    protected $fillable = ['thn_id','no_urut','id_visi_renstra','id_misi_renstra','id_perubahan','uraian_misi_renstra',];

	public function trx_renstra_visi()
  {
      return $this->belongsTo('App\Models\TrxRenstraVisi','id_visi_renstra');
    }

  public function trx_renstra_tujuan()
  {
      return $this->hasMany('App\Models\TrxRenstraTujuan','id_misi_renstra');
    }
}
