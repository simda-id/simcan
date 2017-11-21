<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRkpdRanwalDokumen extends Model
{
    protected $table = 'trx_rkpd_ranwal_dokumen';
    protected $fillable = ['id_dokumen_ranwal', 'nomor_ranwal', 'tanggal_ranwal', 'tahun_ranwal', 'uraian_perkada', 'id_unit_perencana', 'jabatan_tandatangan', 'nama_tandatangan', 'nip_tandatangan', 'flag'];
    protected $primaryKey = 'id_dokumen_ranwal';
    public $timestamps = false;


}
