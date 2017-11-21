<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRpjmdKebijakan extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_rpjmd_kebijakan';
    protected $primaryKey = 'id_kebijakan_rpjmd';
    protected $fillable = ['thn_id','no_urut','id_sasaran_rpjmd','id_kebijakan_rpjmd','id_perubahan','uraian_kebijakan_rpjmd'];

    public function trx_rpjmd_sasaran()
    {
      return $this->belongsTo('App\Models\TrxRpjmdSasaran','id_sasaran_rpjmd');
    }


}
