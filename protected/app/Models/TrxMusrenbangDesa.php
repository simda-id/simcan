<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxMusrenbangDesa extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_musrendes';
    protected $primaryKey = 'id_musrendes';
    protected $fillable = ['tahun_renja',
			'no_urut',
			'id_musrendes',
			'id_renja',
			'id_desa',
			'id_kegiatan',
			'id_asb_aktivitas',
			'uraian_aktivitas_kegiatan',
			'uraian_kondisi',
			'tolak_ukur_aktivitas',
			'target_output_aktivitas',
			'id_satuan',
			'id_satuan_rw',
			'volume',
			'volume_rw',
			'harga_satuan',
			'harga_satuan_rw',
			'jml_pagu',
			'jml_pagu_rw',
			'id_usulan_rw',
			'pagu_aktivitas',
			'sumber_usulan',
			'status_usulan',
			'status_pelaksanaan'];


}