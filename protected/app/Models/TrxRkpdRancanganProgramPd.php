<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRkpdRancanganProgramPd extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_rkpd_rancangan_program_pd';
    protected $primaryKey = 'id_program_pd';
    protected $fillable = ['id_program_pd',
			'id_rkpd_rancangan',
			'tahun_forum',
			'no_urut',
			'id_unit',
			'id_renja_program',
			'id_program_renstra',
			'uraian_program_renstra',
			'id_program_ref',
			'pagu_tahun_renstra',
			'sumber_data',
			'status_pelaksanaan',
			'ket_usulan',
			'status_data',
			'jenis_belanja'
			];


}