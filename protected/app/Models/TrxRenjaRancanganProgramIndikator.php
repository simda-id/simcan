<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRancanganProgramIndikator extends Model
{
    protected $table = 'trx_renja_rancangan_program_indikator';
    protected $primaryKey = 'id_indikator_program_renja';
    public $fillable = ['tahun_renja', 'no_urut', 'id_renja_program', 'id_program_renstra', 'id_indikator_program_renja','id_perubahan', 'kd_indikator', 'uraian_indikator_program_renja', 'tolok_ukur_indikator', 'target_renstra', 'target_renja', 'status_data', 'sumber_data'];
    // protected $relations = [];

    public $timestamps = false;

    // public $fillable = [
    // 	'name',
    // 	'address',
    // 	'lat',
    // 	'lng',
    // ];
}
