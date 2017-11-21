<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRancanganProgram extends Model
{
    protected $table = 'trx_renja_rancangan_program';
    protected $primaryKey = 'id_renja_program';
    public $fillable = ['tahun_renja', 'no_urut', 'id_renja_program', 'id_rkpd_ranwal', 'id_program_rpjmd', 'id_unit', 'id_visi_renstra', 'id_misi_renstra', 'id_tujuan_renstra', 'id_sasaran_renstra', 'id_program_renstra', 'uraian_program_renstra', 'pagu_tahun_ranwal', 'pagu_tahun_renstra', 'status_program_rkpd', 'sumber_data_rkpd', 'sumber_data', 'status_data','jenis_belanja'];
    // protected $relations = [];

    public $timestamps = false;

    // public $fillable = [
    // 	'name',
    // 	'address',
    // 	'lat',
    // 	'lng',
    // ];
}
