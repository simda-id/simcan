<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxMusrenbangRw extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_musrendes_rw';
    protected $primaryKey = 'id_musrendes_rw';
    protected $fillable = ['tahun_musren', 
				'no_urut', 
				'id_musrendes_rw', 
				'id_renja', 
				'id_desa', 
				'id_kegiatan', 
				'id_asb_aktivitas', 
				'uraian_aktivitas_kegiatan', 
				'uraian_kondisi', 
				'id_satuan', 
				'volume', 
				'harga_satuan', 
				'jml_pagu', 
				'status_usulan', 
				'rt', 
				'rw', 
				'lat', 
				'lang'];


}