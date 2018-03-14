<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxPokirUnit extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_pokir_tl_unit';
    protected $primaryKey = 'id_pokir_unit';
    protected $fillable = ['id_pokir_unit', 'unit_tl', 'id_pokir_tl', 'id_pokir', 'id_pokir_usulan', 'id_pokir_lokasi', 'id_aktivitas_renja', 'id_aktivitas_forum', 'status_tl', 'keterangan_status', 'status_data'];

}