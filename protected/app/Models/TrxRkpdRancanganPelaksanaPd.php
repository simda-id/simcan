<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxRkpdRancanganPelaksanaPd extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_rkpd_rancangan_pelaksana_pd';
    protected $primaryKey = 'id_pelaksana_pd';
    protected $fillable = ['id_pelaksana_pd',
			'tahun_forum',
			'no_urut',
			'id_kegiatan_pd',
			'id_sub_unit',
			'id_lokasi',
			'sumber_data',
			'ket_pelaksana',
			'status_data',
			 ];


}