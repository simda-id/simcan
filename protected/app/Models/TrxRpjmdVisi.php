<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRpjmdVisi extends Model
{
    protected $table = 'trx_rpjmd_visi';
    protected $primaryKey = 'id_visi_rpjmd';
    protected $fillable = ['id_visi_rpjmd','thn_id','id_rpjmd','uraian_visi_rpjmd','id_perubahan',];

    public function trx_rpjmd_misi()
    {
        return $this->hasMany('App\Models\TrxRpjmdMisi','id_visi_rpjmd');
      }


    }
