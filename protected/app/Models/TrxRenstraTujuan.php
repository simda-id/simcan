<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRenstraTujuan extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_renstra_tujuan';
    protected $primaryKey = 'id_misi_renstra';
    protected $fillable = ['thn_id','no_urut','id_misi_renstra','id_tujuan_renstra','id_perubahan','uraian_tujuan_renstra',];

    public function trx_renstra_misi()
    {
      return $this->belongsTo('App\Models\TrxRenstraMisi','id_misi_renstra');
    }

    public function trx_renstra_sasaran()
    {
      return $this->hasMany('App\Models\TrxRenstraSasaran','id_tujuan_renstra');
    }

}
