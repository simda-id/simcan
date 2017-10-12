<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefIndikator extends Model
{
    protected $table = 'ref_indikator';
    protected $primaryKey = 'id_indikator';
    protected $fillable = ['id_indikator',
				'jenis_indikator',
				'sifat_indikator',
				'nm_indikator',
				'flag_iku',
				'asal_indikator',
				'sumber_data_indikator'];

    public $timestamps = false;
}
