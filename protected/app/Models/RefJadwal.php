<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class RefJadwal extends Model
{
    //
    
    protected $table = 'ref_jadwal';
    protected $primaryKey = 'id_proses';
    protected $fillable = ['tahun','id_langkah', 'jenis_proses', 'uraian_proses', 'tgl_mulai', 'tgl_akhir', 'status_proses','updated_at', 'created_at'];

    // public $timestamps = false;

 }
