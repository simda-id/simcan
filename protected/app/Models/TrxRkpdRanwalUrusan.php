<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRkpdRanwalUrusan extends Model
{
    protected $table = 'trx_rkpd_ranwal_urusan';
    protected $fillable = ['tahun_rkpd', 'no_urut', 'id_rkpd_ranwal', 'id_urusan_rkpd', 'id_bidang'];
    protected $primaryKey = 'id_urusan_rkpd';
    public $timestamps = false;


}
