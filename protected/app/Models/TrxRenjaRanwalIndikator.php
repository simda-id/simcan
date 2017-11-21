<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrxRenjaRanwalIndikator extends Model
{
    protected $table = 'trx_renja_ranwal_kegiatan_indikator';
    protected $primaryKey = 'id_indikator_kegiatan_renja';
    protected $fillable =['tahun_renja', 
                        'no_urut', 
                        'id_renja',
                        'id_perubahan', 
                        'kd_indikator', 
                        'uraian_indikator_kegiatan_renja', 
                        'tolok_ukur_indikator', 
                        'angka_tahun', 
                        'angka_renstra', 
                        'status_data', 
                        'sumber_data'];
    // protected $relations = [];

    public $timestamps = false;

    // public $fillable = [
    // 	'name',
    // 	'address',
    // 	'lat',
    // 	'lng',
    // ];
}
