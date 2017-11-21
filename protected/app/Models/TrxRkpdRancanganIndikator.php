<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRkpdRancanganIndikator extends Model
{
    protected $table = 'trx_rkpd_rancangan_indikator';
    protected $fillable = ['tahun_rkpd', 'no_urut', 'id_rkpd_rancangan', 'id_indikator_program_rkpd', 'id_perubahan', 'kd_indikator', 'uraian_indikator_program_rkpd', 'tolok_ukur_indikator', 'target_rpjmd', 'target_rkpd', 'status_data','sumber_data'];
    protected $primaryKey = 'id_indikator_program_rkpd';
    public $timestamps = false;


}
