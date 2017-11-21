<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxMusrenbangKecamatan extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_musrencam';
    protected $primaryKey = 'id_musrencam';
    protected $fillable = ['tahun_musren', 'no_urut', 'id_musrencam', 'id_renja', 'id_kecamatan', 'id_kegiatan', 'id_asb_aktivitas', 'uraian_aktivitas_kegiatan', 'uraian_kondisi', 'tolak_ukur_aktivitas', 'target_output_aktivitas', 'id_satuan', 'id_satuan_desa', 'volume', 'volume_desa', 'harga_satuan', 'harga_satuan_desa', 'jml_pagu', 'jml_pagu_desa', 'id_usulan_desa', 'pagu_aktivitas', 'sumber_usulan', 'status_usulan', 'status_pelaksanaan'];


}