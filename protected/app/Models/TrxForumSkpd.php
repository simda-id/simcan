<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxForumSkpd extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_forum_skpd';
    protected $primaryKey = 'id_forum_skpd';
    protected $fillable = ['id_forum_skpd',
			'id_forum_program',
			'id_unit',
			'tahun_forum',
			'no_urut',
			'id_renja',
			'id_rkpd_renstra',
			'id_program_rpjmd',
			'pagu_tahun_ranwal',
			'id_visi_renstra',
			'id_misi_renstra',
			'id_tujuan_renstra',
			'id_sasaran_renstra',
			'id_program_renstra',
			'id_kegiatan_renstra',
			'id_kegiatan_ref',
			'uraian_kegiatan_forum',
			'pagu_tahun_kegiatan',
			'pagu_kegiatan_renstra',
			'pagu_plus1_renja', 
			'pagu_plus1_forum', 
			'pagu_forum',
			'status_data', 
			'status_pelaksanaan',
			'keterangan_status',
			'sumber_data',
			];


}