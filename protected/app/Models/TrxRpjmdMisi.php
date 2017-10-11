<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRpjmdMisi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_rpjmd_misi';
    protected $primaryKey = 'id_misi_rpjmd';
    protected $fillable = ['thn_id_rpjmd','no_urut','id_visi_rpjmd','id_misi_rpjmd','id_perubahan','uraian_misi_rpjmd',];

	public function trx_rpjmd_visi()
  {
      return $this->belongsTo('App\Models\TrxRpjmdVisi','id_visi_rpjmd');
    }

  public function trx_rpjmd_tujuan()
  {
      return $this->hasMany('App\Models\TrxRpjmdTujuan','id_misi_rpjmd');
    }
}
