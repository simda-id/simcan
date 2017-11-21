<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxForumSkpdProgramRanwal extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_forum_skpd_program_ranwal';
    protected $primaryKey = 'id_forum_rkpdprog';
    protected $fillable = ['id_forum_rkpdprog',
			'no_urut',
			'id_rkpd_ranwal',
			'tahun_forum',
			'id_program_rpjmd',
			'id_bidang',
			'id_unit',
			'uraian_program_rpjmd',
			'pagu_rpjmd',
			'pagu_ranwal',
			'keterangan_program',
			'status_data',
			'sumber_data',
			'jenis_belanja'
			];


}