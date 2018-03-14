<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRenstraKegiatan extends Model
{
    public $timestamps = false;
    protected $table = 'trx_renstra_kegiatan';
    protected $primaryKey = 'id_kegiatan_renstra';
    protected $fillable = ['thn_id','no_urut','id_program_renstra','id_kegiatan_renstra','id_kegiatan_ref','id_perubahan','uraian_kegiatan_renstra','pagu_tahun1',
        'pagu_tahun2',
        'pagu_tahun3',
        'pagu_tahun4',
        'pagu_tahun5',
        'total_pagu',
    ];
    
    public function trx_renstra_program()
    {
        return $this->belongsTo('App\Models\TrxRenstraProgram','id_program_renstra');
    }
    
    
    public function ref_kegiatan()
    {
        return $this->belongsTo('App\Models\RefKegiatan','id_kegiatan_ref','id_kegiatan');
    }
    
}
