<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxForumSkpdAktivitas extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_forum_skpd_aktivitas';
    protected $primaryKey = 'id_aktivitas_forum';
    protected $fillable = ['id_aktivitas_forum',
			'id_forum_skpd',
			'tahun_forum',
			'no_urut',
			'sumber_aktivitas',
			'id_aktivitas_asb',
			'id_aktivitas_renja',
			'uraian_aktivitas_kegiatan',
			'volume_aktivitas_1',
			'id_satuan_1',
			'volume_aktivitas_2',
			'id_satuan_2',
			'id_program_nasional',
			'id_program_provinsi',
			'jenis_kegiatan',
			'sumber_dana',
			'pagu_aktivitas_renja',
			'pagu_aktivitas_forum',
			'pagu_musren',
			'status_data',
			'status_musren', 
			'status_pelaksanaan', 
			'keterangan_aktivitas',
			'sumber_data',
			'id_satuan_publik'
			];


}