<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TrxPokirUsulan extends Model
{
    //
    public $timestamps = false;
    protected $table = 'trx_pokir_usulan';
    protected $primaryKey = 'id_pokir_usulan';
    protected $fillable = ['id_pokir',
						'id_pokir_usulan',
						'no_urut',
						'id_judul_usulan',
						'diskripsi_usulan',
						'volume',
						'id_satuan',
						'jml_anggaran'];


}