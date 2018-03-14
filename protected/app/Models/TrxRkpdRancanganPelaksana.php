<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRkpdRancanganPelaksana extends Model
{
    protected $table = 'trx_rkpd_rancangan_pelaksana';
    protected $fillable = ['tahun_rkpd', 'no_urut', 'id_rkpd_rancangan', 'id_urusan_rkpd','id_pelaksana_rpjmd', 'id_unit', 'pagu_rpjmd', 'pagu_rkpd', 'status', 'hak_akses','sumber_data', 'status_pelaksanaan', 'status_data','ket_pelaksanaan'];
    protected $primaryKey = 'id_pelaksana_rpjmd';
    public $timestamps = false;


}
