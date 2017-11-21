<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxPokir extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_pokir';
    protected $primaryKey = 'id_pokir';
    protected $fillable = ['id_tahun','id_pokir','tanggal_pengusul','asal_pengusul','jabatan_pengusul','nama_pengusul','nomor_anggota','daerah_pemilihan','media_pokir','bukti_dokumen'];


}