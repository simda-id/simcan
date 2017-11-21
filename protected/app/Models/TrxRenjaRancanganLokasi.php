<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRancanganLokasi extends Model
{
    protected $table = 'trx_renja_rancangan_lokasi';
    protected $primaryKey = 'id_lokasi_renja';
    // protected $relations = [];

    public $timestamps = false;

    public $fillable = ['tahun_renja ',
            'no_urut ',
            'id_pelaksana_renja ',
            'id_lokasi_renja ',
            'jenis_lokasi ',
            'id_lokasi ',
            'id_kecamatan ',
            'id_desa ',
            'rt ',
            'rw ',
            'uraian_lokasi ',
            'lat ',
            'lang',
            'volume_1',
            'volume_2',
            'id_satuan_1',
            'id_satuan_2'];
    
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
