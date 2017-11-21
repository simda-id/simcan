<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRkpdRanwalIndikator extends Model
{
    protected $table = 'trx_rkpd_ranwal_indikator';
    protected $fillable = ['tahun_rkpd', 'no_urut', 'id_rkpd_ranwal', 'id_indikator_program_rkpd', 'id_perubahan', 'kd_indikator', 'uraian_indikator_program_rkpd', 'tolok_ukur_indikator', 'target_rpjmd', 'target_rkpd', 'status_data','sumber_data'];
    protected $primaryKey = 'id_indikator_program_rkpd';
    public $timestamps = false;


}
