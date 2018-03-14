<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRancangan extends Model
{
    protected $table = 'trx_renja_rancangan';
    protected $primaryKey = 'id_renja';
    // protected $relations = [];

    public $timestamps = false;

    protected $fillable = [
    	'tahun_renja', 
        'no_urut',
        'id_renja_program', 
        'id_rkpd_renstra', 
        'id_rkpd_ranwal', 
        'id_unit', 
        'id_visi_renstra', 
        'id_misi_renstra', 
        'id_tujuan_renstra', 
        'id_sasaran_renstra', 
        'id_program_renstra', 
        'uraian_program_renstra', 
        'id_kegiatan_renstra', 
        'uraian_kegiatan_renstra', 
        'pagu_tahun_renstra', 
        'pagu_tahun_kegiatan', 
        'pagu_tahun_selanjutnya', 
        'sumber_data', 
        'status_pelaksanaan_kegiatan', 
        'status_data',
        'status_rancangan',
    ];
}
