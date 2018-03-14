<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRkpdRanwal extends Model
{
    protected $table = 'trx_rkpd_ranwal';
    protected $fillable = ['id_rkpd_ranwal','no_urut','tahun_rkpd','id_rkpd_rpjmd','thn_id_rpjmd','id_visi_rpjmd','id_misi_rpjmd','id_tujuan_rpjmd','id_sasaran_rpjmd','jenis_belanja',
                            'id_program_rpjmd','uraian_program_rpjmd','pagu_rpjmd','pagu_ranwal','keterangan_program','status_data','status_pelaksanaan','ket_usulan', 'sumber_data'];
    protected $primaryKey = 'id_rkpd_ranwal';
    public $timestamps = false;


}
