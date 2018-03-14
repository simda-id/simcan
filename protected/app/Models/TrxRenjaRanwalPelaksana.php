<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRanwalPelaksana extends Model
{
    protected $table = 'trx_renja_ranwal_pelaksana';
    protected $primaryKey = 'id_pelaksana_renja';
    // protected $relations = [];
    protected $fillable =['tahun_renja ',
				'no_urut ',
				'id_pelaksana_renja ',
				'id_renja ',
				'id_aktivitas_renja ',
				'id_sub_unit ',
				'status_data ',
				'status_pelaksanaan ',
				'ket_usul ',
				'sumber_data',
				'id_lokasi',];

    public $timestamps = false;

    public function getSubUnit() {
        return $this->hasOne('App\RefSubUnit', 'id_sub_unit', 'id_sub_unit');
    }    
}
