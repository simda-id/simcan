<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxForumSkpdProgram extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_forum_skpd_program';
    protected $primaryKey = 'id_forum_program';
    protected $fillable = ['id_forum_program',
			'id_forum_rkpdprog',
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