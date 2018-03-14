<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRenstraStrategi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_renstra_strategi';
    protected $primaryKey = 'id_strategi_renstra';
    protected $fillable = ['thn_id','no_urut','id_sasaran_renstra','id_strategi_renstra','id_perubahan','uraian_strategi_renstra'];

    public function trx_renstra_sasaran()
    {
      return $this->belongsTo('App\Models\TrxRenstraSasaran','id_sasaran_renstra');
    }

}
