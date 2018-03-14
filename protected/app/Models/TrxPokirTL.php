<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxPokirTL extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_pokir_tl';
    protected $primaryKey = 'id_pokir_tl';
    protected $fillable = ['id_pokir_tl', 'id_pokir', 'id_pokir_usulan', 'id_pokir_lokasi', 'unit_tl', 'status_tl', 'keterangan_status','status_data'];

}