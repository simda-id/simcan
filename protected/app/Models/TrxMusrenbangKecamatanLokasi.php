<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxMusrenbangKecamatanLokasi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_musrencam_lokasi';
    protected $primaryKey = 'id_lokasi_musrencam';
    protected $fillable = ['tahun_musren', 'no_urut', 'id_musrencam', 'id_lokasi_musrencam', 'id_lokasi', 'id_desa', 'rt', 'rw', 'uraian_kondisi', 'file_foto', 'lat', 'lang', 'id_musrendes', 'sumber_data', 'volume_desa', 'volume'];


}