<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxPokirLokasi extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_pokir_lokasi';
    protected $primaryKey = 'id_pokir_lokasi';
    protected $fillable = ['id_pokir_lokasi',
						'id_pokir_usulan',
						'id_kecamatan',
						'id_desa',
						'rt',
						'rw',
						'diskripsi_lokasi'];


}