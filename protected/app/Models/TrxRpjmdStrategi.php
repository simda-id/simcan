<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRpjmdStrategi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_rpjmd_strategi';
    protected $primaryKey = 'id_strategi_rpjmd';
    protected $fillable = ['thn_id','no_urut','id_sasaran_rpjmd','id_strategi_rpjmd','id_perubahan','uraian_strategi_rpjmd'];

    public function trx_rpjmd_sasaran()
    {
      return $this->belongsTo('App\Models\TrxRpjmdSasaran','id_sasaran_rpjmd');
    }

}
