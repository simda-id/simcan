<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxMusrenbangDesaLokasi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_musrendes_lokasi';
    protected $primaryKey = 'id_lokasi_musrendes';
    protected $fillable = ['tahun_musren',
				'no_urut',
				'id_musrendes',
				'id_lokasi_musrendes',
				'id_lokasi',
				'id_desa',
				'rt',
				'rw',
				'uraian_kondisi',
				'file_foto',
				'lat',
				'lang',
				'sumber_data',
				'volume_rw',
				'volume_desa'];
}