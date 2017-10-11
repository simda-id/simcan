<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxRkpdRanhirLokasi extends Model
{
    protected $table = 'trx_rkpd_ranhir_lokasi';
    protected $primaryKey = 'id_lokasi_rkpd';
    // protected $relations = [];

    public $timestamps = false;

    // public $fillable = [
    // 	'name',
    // 	'address',
    // 	'lat',
    // 	'lng',
    // ];
    
    public function desa()
    {
        return $this->hasOne('App\RefDesa', 'id_desa', 'id_desa');
    } 

    public function lokasi()
    {
        return $this->hasOne('App\RefLokasi', 'id_lokasi', 'id_lokasi');
    }

    public function pelaksana()
    {
        return $this->hasOne('App\TrxRenjaRancanganPelaksana', 'id_pelaksana_renja', 'id_pelaksana_renja');
    } 
}
