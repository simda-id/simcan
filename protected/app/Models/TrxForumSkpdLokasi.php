<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxForumSkpdLokasi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_forum_skpd_lokasi';
    protected $primaryKey = 'id_lokasi_forum';
    protected $fillable = ['tahun_forum',
				'no_urut',
				'id_pelaksana_forum',
				'id_lokasi_forum',
				'id_lokasi',
				'id_lokasi_teknis',
				'id_lokasi_renja',
				'jenis_lokasi',
				'id_desa',
				'id_kecamatan',
				'rt',
				'rw',
				'uraian_lokasi',
				'lat',
				'lang',
				'status_data',
				'status_pelaksanaan',
				'ket_lokasi',
				'sumber_data',
	            'volume_1',
	            'volume_2',
	            'volume_usulan_1',
	            'volume_usulan_2',
	            'id_satuan_1',
	            'id_satuan_2'
				];


}