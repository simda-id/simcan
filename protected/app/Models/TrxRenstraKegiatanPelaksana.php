<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRenstraKegiatanPelaksana extends Model
{
    public $timestamps = false;
    protected $table = 'trx_renstra_kegiatan_pelaksana';
    protected $primaryKey = 'id_kegiatan_renstra_pelaksana';
    protected $fillable = ['thn_id','no_urut','id_kegiatan_renstra','id_kegiatan_renstra_pelaksana','id_perubahan','id_sub_unit',
    ];
    
    public function trx_renstra_kegiatan()
    {
        return $this->belongsTo('App\Models\TrxRenstraKegiatan','id_kegiatan_renstra');
    }
    
    
    public function ref_sub_unit()
    {
        return $this->belongsTo('App\Models\RefSubUnit','id_sub_unit','id_sub_unit');
    }
    
}
