<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRenjaRancanganDokumen extends Model
{
    protected $table = 'trx_renja_rancangan_dokumen';
    protected $fillable = ['id_dokumen_ranwal', 'id_unit_renja', 'nomor_ranwal', 'tanggal_ranwal', 'tahun_ranwal', 'uraian_perkada', 'jabatan_tandatangan', 'nama_tandatangan', 'nip_tandatangan', 'flag'];
    protected $primaryKey = 'id_dokumen_ranwal';
    public $timestamps = false;


}
