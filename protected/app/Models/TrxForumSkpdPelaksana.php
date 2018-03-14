<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxForumSkpdPelaksana extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_forum_skpd_pelaksana';
    protected $primaryKey = 'id_pelaksana_forum';
    protected $fillable = ['id_pelaksana_forum',
			'tahun_forum',
			'no_urut',
			'id_aktivitas_forum',
			'id_sub_unit',
			'id_lokasi',
			'sumber_data',
			'ket_pelaksana',
			'status_data',
			 ];


}